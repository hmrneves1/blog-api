<?php

namespace App\Http\Controllers\Api\v1\Logs;

use App\Http\Controllers\Controller;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

class LogsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Returns all logs from a specific user
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function logs_by_user_id(Request $request)
    {
        // Get user logs
        $logs = Activity::where('causer_id', '=', $request->user_id)->get();

        // Return logs
        return $this->response(true, 200, config('http_responses.200'), $logs);
    }
}
