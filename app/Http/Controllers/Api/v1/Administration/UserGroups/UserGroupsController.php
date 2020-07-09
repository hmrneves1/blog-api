<?php

namespace App\Http\Controllers\Api\v1\Administration\UserGroups;

use App\Http\Controllers\Controller;
use App\Models\Api\v1\Users\UserGroup;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Http\Request;

/**
 * @group Administration - User Groups
 */
class UserGroupsController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Get all possible users groups
     */
    public function index()
    {
        // Return response
        return $this->response(true, 200, config('http_responses.200'), UserGroup::all());
    }
}
