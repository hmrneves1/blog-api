<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\RequestResetPasswordToken;
use App\Http\Requests\Api\v1\Auth\SetNewPassword;
use App\Traits\Api\v1\ApiResponse;
use App\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;

/**
 * @group Authentication
 */
class ResetPasswordController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Request a reset password token
     */
    public function request_token(RequestResetPasswordToken $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Get user data
        $user = User::where('email', '=', $validated_data['email'])->first();

        // Check if user exists
        if($user)
        {
            // Generate an unique token
            $token = sha1($validated_data['email'].'_'.date('Y-m-d H:i:s'));

            // Store the token
            $stored = $user->update([
                'pw_reset_token' => $token,
                'pw_reset_token_expiration' => date('Y-m-d H:i:s', strtotime('+1 hour')),
            ]);

            // Validate if the token was stored
            if ($stored)
            {
                // Return response with code
                return $this->response(true, 200, config('http_responses.200'), [
                    'set_new_password_url' => route('auth.set_new_password'),
                    'email' => $validated_data['email'],
                    'token' => $token
                ]);
            }

            // Return response with error
            return $this->response(false, 500, config('http_responses.500'), []);
        }

        // Return 404
        return $this->response(false, 404, config('http_responses.404'), []);
    }


    public function set_new_password(SetNewPassword $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Get user data
        $user = User::where('email', '=', $validated_data['email'])->where('pw_reset_token', '=', $validated_data['token'])->first();

        // Check if the user with the email and token exists
        if($user)
        {
            // Make visible the hidden attributes on Model
            $user = $user->makeVisible(['pw_reset_token', 'pw_reset_token_expiration']);

            // Validate if the token isn't expired
            if (strtotime($user->pw_reset_token_expiration) < time())
            {
                // Return response with error
                return $this->response(false, 401, config('http_responses.401'), []);
            }

            // Update user password
            $updated = $user->update([
                'password' => Hash::make($validated_data['password']),
                'pw_reset_token' => null,
                'pw_reset_token_expiration' => null,
            ]);

            // Validate if it was updated
            if ($updated)
            {
                // Return response with error
                return $this->response(true, 200, config('http_responses.200'), []);
            }

            // Return response with error
            return $this->response(false, 500, config('http_responses.500'), []);
        }

        // Return 404
        return $this->response(false, 404, config('http_responses.404'), []);
    }
}
