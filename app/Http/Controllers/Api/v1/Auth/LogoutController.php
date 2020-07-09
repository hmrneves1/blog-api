<?php

namespace App\Http\Controllers\Api\v1\Auth;

use App\Http\Controllers\Controller;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * @group Authentication
 */
class LogoutController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Logout user device
     *
     * @param Request $request
     * @return string
     */
    public function logout(Request $request)
    {
        // Delete the token
        $deleted = $request->user()->token()->delete();

        // Validate if the token was deleted
        if ($deleted)
        {
            // return response
            return $this->response(true, 200, config('http_responses.200'), []);
        }

        // return error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Logout all user devices
     */
    public function logout_all_devices(Request $request)
    {
        // Get all tokens from the user
        $tokens = $request->user()->tokens;

        // Delete all tokens
        foreach ($tokens as $token)
        {
            $token->delete();
        }

        // return response
        return $this->response(true, 200, config('http_responses.200'), []);
    }
}
