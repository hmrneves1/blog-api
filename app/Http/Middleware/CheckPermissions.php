<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $permission
     * @return mixed
     */
    public function handle($request, Closure $next, $group_id)
    {
        // If the user belongs to the $group_id 1, administrator, go to next request
        if (Auth::user()->group_id === 1)
        {
            return $next($request);
        }

        // Return error
        return response()->json(['error' => 'Forbidden.'], 403);
    }
}
