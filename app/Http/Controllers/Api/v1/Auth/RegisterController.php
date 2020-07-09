<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\Register;
use App\Models\Api\v1\Subscribers\Subscribers;
use App\Traits\Api\v1\ApiResponse;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

/**
 * @group Authentication
 */
class RegisterController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Register
     *
     * @param Register $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function register(Register $request)
    {
        // Get the validated data from the request.
        $validated_data = $request->validated();

        // Hash password
        $validated_data['password'] = Hash::make($validated_data['password']);

        // Store the new user
        $new_user_created = User::create($validated_data);

        // Check if the new user was stored
        if ($new_user_created)
        {
            // Get user collection
            $user = User::findOrFail($new_user_created->user_id);

            // Automatically subscribe
            $subscribed = Subscribers::create([
                'user_id' => $user->user_id,
                'name' => $user->name,
                'email' => $user->email
            ]);

            // Generate a new auth token
            $accessToken = $user->createToken('authToken')->accessToken;

            // Return user and token
            return $this->response(true, 200, config('http_responses.200'), ['user' => $user, 'access_token' => $accessToken]);
        }

        // Return default error
        return $this->response(false, 500, config('http_responses.500'), []);
    }
}
