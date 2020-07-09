<?php

namespace App\Http\Controllers\Api\v1\Categories;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\v1\Categories\StoreNewCategory;
use App\Http\Requests\Api\v1\Categories\UpdateCategory;
use App\Models\Api\v1\Categories\Categories;
use App\Traits\Api\v1\ApiResponse;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @group Categories
 *
 * Managing categories.
 */
class CategoriesController extends Controller
{
    /**
     * Import ApiResponse Trait
     */
    use ApiResponse;

    /**
     * Get All Categories
     *
     * Returns all available categories
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        // return categories
        return $this->response(true, 200, config('http_responses.200'), Categories::all());
    }

    /**
     * Create
     *
     * Store a new category into the database
     *
     * @param StoreNewCategory $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(StoreNewCategory $request)
    {
        // Get the validated data from the request
        $validated_data = $request->validated();

        // Store the new category
        $new_category = Categories::create($validated_data);

        // Check if the category was created
        if ($new_category)
        {
            // return success response
            return $this->response(true, 201, config('http_responses.201'), $new_category);
        }

        // return default error response
        return $this->response(false, 500, config('http_responses.500'), []);
    }

    /**
     * Read
     *
     * Show data from a specific category
     *
     * @param $category_id
     * @return CategoriesResource|\Illuminate\Http\JsonResponse
     */
    public function show($category_id)
    {
        // Get the category data
        $category = Categories::findOrFail($category_id);

        // return category
        return $this->response(true, 200, config('http_responses.200'), $category);
    }

    /**
     * Update
     *
     * Updates data from a specific category
     *
     * @param UpdateCategory $request
     * @param $category_id
     * @return CategoriesResource|\Illuminate\Http\JsonResponse
     */
    public function update(UpdateCategory $request, $category_id)
    {
        // Get the category data
        $category = Categories::findOrFail($category_id);

        // Get the validated data from the request
        $validated_data = $request->validated();

        // Update the category
        $updated = $category->update($validated_data);

        // The category was updated successfully
        if ($updated)
        {
            // return error response
            return $this->response(true, 200, config('http_responses.200'), $category);
        }

        // return error response
        return $this->response(false, 404, config('http_responses.404'), []);
    }

    /**
     * Delete
     *
     * Removes a specific category from the database
     *
     * @param $category_id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($category_id)
    {
        // Get the category data
        $category = Categories::findOrFail($category_id);

        // Delete the category
        $deleted = $category->delete();

        // If the category was deleted, return a message
        if ($deleted)
        {
            // Return success message
            return $this->response(true, 204, config('http_responses.204'), []);
        }

        // return error response
        return $this->response(false, 404, config('http_responses.404'), []);
    }
}
