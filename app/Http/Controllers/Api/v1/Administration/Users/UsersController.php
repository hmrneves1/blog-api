<?php

namespace App\Http\Controllers\Api\v1\Administration\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Administration\Users\ListUserComments;
use App\Http\Requests\Api\v1\Administration\Users\ListUserPosts;
use App\Http\Requests\Api\v1\Administration\Users\UpdateUserGroup;
use App\Traits\Api\v1\ApiResponse;
use App\User;
use Illuminate\Http\Request;

/**
 * @group Administration - Users
 */
class UsersController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * List all users
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_users()
    {
        // Return response
        return $this->response(true, 200, config('http_responses.200'), User::all());
    }

    /**
     * Returns posts from a given user
     *
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_user_posts(ListUserPosts $request)
    {
        // Get data
        $data = User::with(['posts' => function($query) use ($request) {

            // Define the result limit if the value is greater than 0, else show all
            if ($request->limit > 0) {
                $query->take($request->limit);
            }

            // Define order by
            $query->orderBy('post_id', $request->order_by);

        }])->findOrFail($request->user_id);

        // Return response
        return $this->response(true, 200, config('http_responses.200'), $data);
    }

    /**
     * Returns comments from a given user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function list_user_comments(ListUserComments $request)
    {
        // Get data
        $data = User::with(['comments' => function($query) use ($request) {

            // Define the result limit if the value is greater than 0, else show all
            if ($request->limit > 0) {
                $query->take($request->limit);
            }

            // Define order by
            $query->orderBy('comment_id', $request->order_by);

        }])->findOrFail($request->user_id);

        // Return response
        return $this->response(true, 200, config('http_responses.200'), $data);
    }

    /**
     * Update user group
     */
    public function update_user_group(UpdateUserGroup $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Get user
        $user = User::findOrFail($validated_data['user_id']);

        // Update User group
        $updated = $user->update([
            'group_id' => $validated_data['group_id'],
        ]);

        // Validate if the user was updated
        if ($updated)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), $user);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
