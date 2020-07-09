<?php

namespace App\Http\Controllers\Api\v1\Administration\Comments;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Comments\PendingComments;
use App\Models\Api\v1\Comments\PostsComments;
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
     * List all pending comments
     */
    public function comments()
    {
        // Get all comments
        $comments = PendingComments::with('author')->get();

        // Return response
        return $this->response(true, 200, config('http_response.200'), $comments);
    }

    /**
     * Approve pending comment
     */
    public function approve(Request $request)
    {
        // Find pending comment
        $pending_comment = PendingComments::findOrFail($request->comment_id);

        // Move comment from pending table to main comment table
        $stored = PostsComments::create([
            'post_id' => $pending_comment->post_id,
            'user_id' => $pending_comment->user_id,
            'comment' => $pending_comment->comment,
            'parent_id' => $pending_comment->parent_id,
        ]);

        // Validate if the comment was stored
        if ($stored)
        {
            // Remove the comment from the pendings table
            $deleted = $pending_comment->delete();

            // Validate if the comment was deleted
            if ($deleted)
            {
                return $this->response(true, 200, config('http_responses.200'), []);
            }
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
        $deleted = PendingComments::findOrFail($request->comment_id)->delete();

        // Validate if the comment was deleted
        if ($deleted)
        {
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Return default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
