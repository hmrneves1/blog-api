<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Auth\Login;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Traits\Api\v1\ApiResponse;

class LoginController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Login method
     *
     * @param Login $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function login (Login $request)
    {
        /**
         * Try find the user
         * If we don't get any user with the provided email, throw a decoy message
         */
        $user = User::where('email', $request->email)->first();
        if ($user === null)
        {
            return $this->response(false, 401, config('http_responses.401'), []);
        }

        /**
         * Try to authenticate the user
         * If we can't login with the provided email/password, throw an error message
         */
        if (!Auth::attempt($request->all()))
        {
            return $this->response(false, 401, config('http_responses.401'), []);
        }

        /**
         * Generate a new auth token
         */
        $accessToken = Auth::user()->createToken('authToken')->accessToken;

        /**
         * Return user and token
         */
        return $this->response(true, 200, config('http_responses.200'), ['user' => Auth::user(), 'access_token' => $accessToken]);
    }
}
