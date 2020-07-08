<?php

namespace App\Http\Controllers\Api\v1\Administration\Posts;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Posts\PendingPosts;
use App\Models\Api\v1\Posts\Posts;
use App\Traits\Api\v1\ApiResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

class ManagePostsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * List all pending posts
     *
     * List all posts pending to approval
     *
     * @return mixed
     */
    public function pending_posts()
    {
        // Get all posts
        $posts = PendingPosts::with('author')->get();

        //Return posts
        return $this->response(true, 200, config('http_responses.200'), $posts);
    }

    /**
     * Approve a pending post
     *
     * Moves a post from the pending posts table to the main posts table
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function approve_post(Request $request)
    {
        // Find pending post
        $pending_post = PendingPosts::findOrFail($request->post_id);

        // Move post from pending table to main posts table
        $stored = Posts::create([
            'user_id' => $pending_post->user_id,
            'slug' => SlugService::createSlug(Posts::class, 'slug', $pending_post->title),
            'title' => $pending_post->title,
            'body' => $pending_post->body,
            'image' => $pending_post->image,
        ]);

        // Validate if the post was stored
        if ($stored)
        {
            // Remove the post from the pendings table
            $deleted = $pending_post->delete();

            // Validate if the post was deleted
            if ($deleted)
            {
                return $this->response(true, 200, config('http_responses.200'), []);
            }
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Delete a pending posts
     *
     * To use when the post wasn't approved
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function delete_pending_post(Request $request)
    {
        // Find pending post
        $deleted = PendingPosts::findOrFail($request->post_id)->delete();

        // Validate if the post was deleted
        if ($deleted)
        {
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
