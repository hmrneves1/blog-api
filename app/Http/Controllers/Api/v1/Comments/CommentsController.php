<?php

namespace App\Http\Controllers\Api\v1\Comments;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Comments\EditComment;
use App\Http\Requests\Api\v1\Comments\StoreNewComment;
use App\Models\Api\v1\Comments\PostsComments;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CommentsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Stores a new comment
     *
     * @param StoreNewComment $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreNewComment $request)
    {
        // Get the validated data from the request.
        $validated_data = $request->validated();

        // Set the user_id on the $validated_data
        $validated_data['user_id'] = Auth::user()->user_id;

        // Store the comment
        $comment_stored = PostsComments::create($validated_data);

        // Check if the comment was stored
        if ($comment_stored)
        {
            // Return success message
            return $this->response(true, 201, config('http_responses.201'), $comment_stored);
        }

        // Default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Updates data from a specific comment
     *
     * @param EditComment $request
     * @param $comment_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(EditComment $request, $comment_id)
    {
        // Get the comment data
        $comment = PostsComments::findOrFail($comment_id);

        // Get the validated data from the request
        $validated_data = $request->validated();

        /**
         * Permissions
         * 1. If the user doesn't belong to the Administrators group
         * 2. If the user isn't the comment owner
         * 3. Throw error.
         */
        if (Auth::user()->group->group_id !== 1)
        {
            // Check if the user is the comment owner, if not, throw error
            if (Auth::user()->user_id !== $comment->user_id)
            {
                // Return success message
                return $this->response(false, 403, config('http_responses.403'), []);
            }
        }

        // Update the comment
        $comment_updated = $comment->update($validated_data);

        // Check if the comment was updated
        if ($comment_updated)
        {
            // Return success message
            return $this->response(true, 200, config('http_responses.200'), $comment);
        }

        // Default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Removes a specific comment from the database
     *
     * @param $comment_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($comment_id)
    {
        // Get the comment data
        $comment = PostsComments::findOrFail($comment_id);

        /**
         * Permissions
         * 1. If the user doesn't belong to the Administrators group
         * 2. If the user isn't the comment owner
         * 3. Throw error.
         */
        if (Auth::user()->group->group_id !== 1)
        {
            // Check if the user is the comment owner, if not, throw error
            if (Auth::user()->user_id !== $comment->user_id)
            {
                // Return success message
                return $this->response(false, 403, config('http_responses.403'), []);
            }
        }

        // Delete the comment
        $deleted = $comment->delete();

        // Check if the comment was deleted
        if ($deleted)
        {
            // Return success message
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // Default error message
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
