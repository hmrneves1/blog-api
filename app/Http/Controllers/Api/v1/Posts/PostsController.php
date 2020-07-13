<?php

namespace App\Http\Controllers\Api\v1\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Posts\StoreNewPost;
use App\Http\Requests\Api\v1\Posts\UpdatePost;
use App\Models\Api\v1\Categories\Categories;
use App\Models\Api\v1\Posts\AutoAcceptPosts;
use App\Models\Api\v1\Posts\PendingPosts;
use App\Models\Api\v1\Posts\Posts;
use App\Traits\Api\v1\ApiResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

/**
 * @group Posts
 */
class PostsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Get the minimum posts value for the post be auto accepted
     *
     * @return mixed
     */
    private function auto_accept_number()
    {
        return AutoAcceptPosts::findOrFail(1)->min_posts;
    }

    /**
     * Get the number of posts from the logged user
     *
     * @return mixed
     */
    private function user_posts_count()
    {
        return auth()->user()->posts->count();
    }

    /**
     * Get All Posts
     */
    public function index(Request $request)
    {
        // Get all posts
        $posts = Posts::with('author')->where('approved' , 1)->orderBy('post_id', 'desc')->paginate(5);

        //Return posts
        return $this->response(true, 200, config('http_responses.200'), $posts);
    }

    /**
     * Create
     *
     * @param StoreNewPost $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreNewPost $request)
    {
        //Get the validated data from the request.
        $validated_data = $request->validated();


        // Check if we processed an image
        if ($request->has('image'))
        {
            // Set file_name - we'll use this to save the file_name into the db
            $file_name = uniqid().'_'.date('Ymd_his').'.'.$validated_data['image']->getClientOriginalExtension();

            // store the file into the folder
            $validated_data['image']->storeAs('public/posts/', $file_name);

            // Assign the name to the $validated_data array
            $validated_data['image'] = $file_name;
        }

        // Set user_id
        $validated_data['user_id'] = auth()->user()->user_id;

        // Store the post
        // The function sluggable() with handle the slug for this post
        // Remainder that the slugs should be unique
        /**
         * Store the post
         * * Notes
         * * * 1. The function sluggable() with handle the slug for this post
         * * * 2. Validate where the post should be stored by the number of accepted posts
         */
        if ($this->user_posts_count() >= $this->auto_accept_number())
        {
            $post = Posts::create($validated_data);
        } else {
            $post = PendingPosts::create($validated_data);
        }

        // Check if the post was stored successfully
        if ($post)
        {
            // Sync Categories to the Post
            $post->categories()->attach($validated_data['categories']);

            //return response
            return $this->response(true, 200, config('http_responses.200'), $post);
        }

        // return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Read
     */
    public function show($slug)
    {
        // Get the post data with the relations
        $post = Posts::where('slug', '=', $slug)->with('comments', 'author', 'categories')->get();

        // If we doesn't get any post with the given slug, throw error
        if ($post->isEmpty())
        {
            // Return error
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        // Return the post, by default
        return $this->response(true, 200, config('http_responses.200'), $post);
    }

    /**
     * Update
     */
    public function update(UpdatePost $request, $post_id)
    {
        // Get the post data
        $post = Posts::findOrFail($post_id);

        // Get the validated data from the request
        $validated_data = $request->validated();

        // Check if the user changed the title, if yes, generate a new slug
        if ($validated_data['title'] !== null)
        {
            // Generate a slug to this post
            $validated_data['slug'] = SlugService::createSlug(Posts::class, 'slug', $validated_data['title']);
        }

        // Unset null values from $validated_data, we don't need them
        foreach ($validated_data as $key => $data)
        {
            if ($data === null)
            {
                unset($validated_data[$key]);
            }
        }

        // Check if we processed an image
        if ($request->has('image'))
        {
            // Set file_name - we'll use this to save the file_name into the db
            $file_name = uniqid().'_'.date('Ymd_his').'.'.$validated_data['image']->getClientOriginalExtension();

            // store the file into the folder
            $validated_data['image']->storeAs('public/posts/', $file_name);

            // Assign the name to the $validated_data array
            $validated_data['image'] = $file_name;

            // Delete old post image
            Storage::delete('public/posts/'.$post->image);
        }

        // Update post
        $post_updated = $post->update($validated_data);

        // Check if the post was updated
        if ($post_updated)
        {
            // Sync Categories to the Post
            $post->categories()->sync($validated_data['categories']);

            // Return updated post
            return $this->response(true, 200, config('http_responses.200'), $post);
        }

        // Return error by default
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Delete
     */
    public function destroy($post_id)
    {
        // Get the post data
        $post = Posts::findOrFail($post_id);

        // Delete the post
        $deleted = $post->delete();

        // If the post was deleted, return a message
        if ($deleted)
        {
            // Return success message
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Return error message by default
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Search posts by keyword
     */
    public function search_posts_by_keyword($keyword)
    {
        // If the $keyword is empty, return error
        if ($keyword === null)
        {
            return $this->response(false, 422, config('http_responses.422'), []);
        }

        // Get posts by title keyword
        $posts = Posts::with('author')->where('title', 'LIKE', '%'.$keyword.'%')->orderBy('post_id', 'desc')->paginate(5);

        // If no posts found, return 404
        if ($posts->isEmpty())
        {
            // Return error
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        // Return the posts by default
        return $this->response(true, 200, config('http_responses.200'), $posts);
    }

    /**
     * Search posts by category id
     */
    public function search_posts_by_category($category_id)
    {
        // If $category_id is empty or not numeric, return error
        if ($category_id === null || !is_numeric($category_id))
        {
            return $this->response(false, 422, config('http_responses.422'), []);
        }

        // Get the posts
        $posts = Categories::findOrFail($category_id)->posts()->with('author')->orderBy('post_id', 'desc')->paginate(5);

        // If no posts found, return 404
        if ($posts->isEmpty())
        {
            // Return error
            return $this->response(false, 404, config('http_responses.404'), []);
        }

        // Return the posts by default
        return $this->response(true, 200, config('http_responses.200'), $posts);
    }
}
