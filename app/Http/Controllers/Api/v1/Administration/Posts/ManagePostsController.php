<?php

namespace App\Http\Controllers\Api\v1\Administration\Posts;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Administration\Posts\AutoAcceptPostsValue;
use App\Models\Api\v1\Posts\AutoAcceptPosts;
use App\Models\Api\v1\Posts\PendingPosts;
use App\Models\Api\v1\Posts\Posts;
use App\Traits\Api\v1\ApiResponse;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;

/**
 * @group Administration - Pending Posts
 */
class ManagePostsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Updates the default value used to check if a post can be auto accepted or not
     *
     * @param AutoAcceptPostsValue $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_auto_accept_post_value(AutoAcceptPostsValue $request)
    {
        // Return only the validated data
        $validated_data = $request->validated();

        // Update value
        $updated = AutoAcceptPosts::find(1)->update([
            'min_posts' => $validated_data['min_posts'],
        ]);

        // Validate if the record was updated
        if ($updated)
        {
            // Return success response
            return $this->response(true, 200, config('http_responses.200'), []);
        }

        // Return error response by default
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * List all pending posts
     *
     * @return mixed
     */
    public function pending_posts()
    {
        // Get all posts
        $posts = Posts::with('author')->where('approved' , 0)->paginate(5);

        //Return posts
        return $this->response(true, 200, config('http_responses.200'), $posts);
    }

    /**
     * Approve a pending post
     */
    public function approve_post(Request $request)
    {
        // Update Post
        $updated = Posts::findOrFail($request->post_id)->update([
            'approved' => 1,
        ]);

        // Validate if the post was updated
        if ($updated)
        {
            // Return success response
            return $this->response(true, 200, config('http_responses.200'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Delete a pending posts
     */
    public function delete_pending_post(Request $request)
    {
        // Find pending post
        $deleted = Posts::findOrFail($request->post_id)->delete();

        // Validate if the post was deleted
        if ($deleted)
        {
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
