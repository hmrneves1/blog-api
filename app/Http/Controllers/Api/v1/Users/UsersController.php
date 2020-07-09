<?php

namespace App\Http\Controllers\Api\v1\Users;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Users\UpdateAvatar;
use App\Http\Requests\Api\v1\Users\UpdateEmail;
use App\Http\Requests\Api\v1\Users\UpdatePassword;
use App\Traits\Api\v1\ApiResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

/**
 * @group Users
 */
class UsersController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Read
     *
     * @param $user_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function index($user_id)
    {
        /**
         * Validate if the $user_id is a number
         * If not, return 422
         */
        if (!is_numeric($user_id))
        {
            // Return response
            return $this->response(false, 422, config('http_responses.422'), []);
        }

        /**
         * Is the authenticated user equals the $user_id
         *
         * Return user + own posts + own comments
         */
        if (auth()->user()->user_id === (int) $user_id)
        {
            // Get data
            $data = User::with('posts', 'comments')->findOrFail($user_id);

            // Return response
            return $this->response(true, 200, config('http_responses.200'), $data);
        }

        /**
         * Is the authenticated user doesn't equal the $user_id
         *
         * Return user
         */
        if (auth()->user()->user_id !== (int) $user_id)
        {
            // Get data
            $data = User::findOrFail($user_id);

            // Return response
            return $this->response(true, 200, config('http_responses.200'), $data);
        }

        // Return default response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Update user email
     */
    public function update_email(UpdateEmail $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Validate if the $validated_data['user_id'] equals to the logged user
        // If not, return 403
        if ((int)$validated_data['user_id'] !== auth()->user()->user_id)
        {
            // return response
            return $this->response(false, 403, config('http_responses.403'), []);
        }

        // Get user
        $user = User::findOrFail($validated_data['user_id']);

        // Update user email
        $updated = $user->update([
            'email' => $validated_data['email'],
        ]);

        // Check if the user was successfully updated
        if ($updated)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), $user);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Update user password
     */
    public function update_password(UpdatePassword $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Validate if the $validated_data['user_id'] equals to the logged user
        // If not, return 403
        if ((int)$validated_data['user_id'] !== auth()->user()->user_id)
        {
            // return response
            return $this->response(false, 403, config('http_responses.403'), []);
        }

        // Get user
        $user = User::findOrFail($validated_data['user_id']);

        // Update user email
        $updated = $user->update([
            'password' => Hash::make($validated_data['password']),
        ]);

        // Check if the user was successfully updated
        if ($updated)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), $user);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Update user avatar
     */
    public function update_avatar(UpdateAvatar $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Validate if the $validated_data['user_id'] equals to the logged user
        // If not, return 403
        if ((int)$validated_data['user_id'] !== auth()->user()->user_id)
        {
            // return response
            return $this->response(false, 403, config('http_responses.403'), []);
        }

        // Get user
        $user = User::findOrFail($validated_data['user_id']);

        // Set file name
        $file_name = hash('sha256', auth()->user()->user_id.'_'.date('Y-m-d H:i:s')).'.'.$validated_data['avatar']->getClientOriginalExtension();

        // Store the file into the folder
        $validated_data['avatar']->storeAs('public/avatars/', $file_name);

        // Unlink old avatar if it's not the default
        if (auth()->user()->avatar != 'default.png' && auth()->user()->avatar != null && auth()->user()->avatar != '') {
            Storage::delete('public/avatars/'.auth()->user()->avatar);
        }

        // Update user email
        $updated = $user->update([
            'avatar' => $file_name,
        ]);

        // Check if the user was successfully updated
        if ($updated)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), $user);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
