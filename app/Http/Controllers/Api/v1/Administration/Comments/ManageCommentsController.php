<?php

namespace App\Http\Controllers\Api\v1\Administration\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Administration\Comments\AutoAcceptCommentsValue;
use App\Models\Api\v1\Comments\AutoAcceptComments;
use App\Models\Api\v1\Comments\PendingComments;
use App\Models\Api\v1\Comments\PostsComments;
use App\Models\Api\v1\Posts\Posts;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Http\Request;

/**
 * @group Administration - Pending Comments
 */
class ManageCommentsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Updates the default value used to check if a comment can be auto accepted or not
     *
     * @param AutoAcceptCommentsValue $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update_auto_accept_comments_value(AutoAcceptCommentsValue $request)
    {
        // Return only the validated data
        $validated_data = $request->validated();

        // Update value
        $updated = AutoAcceptComments::find(1)->update([
            'min_comments' => $validated_data['min_comments'],
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
     * List all pending comments
     */
    public function comments()
    {
        // Get all comments
        $comments = PostsComments::with('author')->where('approved' , 0)->paginate(5);

        // Return response
        return $this->response(true, 200, config('http_response.200'), $comments);
    }

    /**
     * Approve pending comment
     */
    public function approve(Request $request)
    {
        // Update Post
        $updated = PostsComments::findOrFail($request->comment_id)->update([
            'approved' => 1,
        ]);

        // Validate if the comment was updated
        if ($updated)
        {
            // Return success response
            return $this->response(true, 200, config('http_responses.200'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Delete a pending comment
     */
    public function delete(Request $request)
    {
        // Find pending post
        $deleted = PostsComments::findOrFail($request->comment_id)->delete();

        // Validate if the comment was deleted
        if ($deleted)
        {
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
