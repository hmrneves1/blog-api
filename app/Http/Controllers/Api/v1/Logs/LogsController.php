<?php

namespace App\Http\Controllers\Api\v1\Logs;

use App\Http\Controllers\Controller;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Http\Request;
use Spatie\Activitylog\Models\Activity;

/**
 * @group Logs
 */
class LogsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Get user logs
     */
    public function logs_by_user_id($user_id)
    {
        // Get user logs
        $logs = Activity::where('causer_id', '=', $user_id)->orderBy('id', 'desc')->get();

        // Return logs
        return $this->response(true, 200, config('http_responses.200'), $logs);
    }
}
