<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/**
 * Public routes to authentication
 */
Route::post('/auth/register', 'Auth\RegisterController@register');
Route::post('/auth/login', 'Auth\LoginController@login');


/**
 * Public routes to categories
 */
Route::get('/categories', 'Categories\CategoriesController@index');
Route::get('/categories/{category_id}', 'Categories\CategoriesController@show');

/**
 * Public routes to posts
 */
Route::get('/posts', 'Posts\PostsController@index');
Route::get('/posts/{slug}', 'Posts\PostsController@show');

/**
 * Public routes to search for posts
 */
Route::get('/search/posts/by-keyword', 'Posts\PostsController@search_posts_by_keyword');
Route::get('/search/posts/by-category', 'Posts\PostsController@search_posts_by_category');

/**
 * Public routes to subscribe
 */
Route::post('/subscribers', 'Subscribers\SubscribersController@subscribe');
Route::post('/subscribers/request-unsubscribe-token', 'Subscribers\SubscribersController@request_unsuscribe_token');
Route::post('/subscribers/unsubscribe-by-token', 'Subscribers\SubscribersController@unsubscribeByToken');


/**
 * Collection of routes that requires authentication via token
 */
Route::middleware(['auth:api'])->group(function () {
    /**
     * Authentication routes that the users needs to be authenticated
     */
    Route::post('/auth/logout', 'Auth\LogoutController@logout');

    /**
     * Collection of routes that requires the user to be Administrator, group_id 1
     */
    Route::middleware(['CheckPermissions:1'])->group(function () {
        /**
         * Categories routes
         */
        Route::post('/categories', 'Categories\CategoriesController@store');
        Route::put('/categories/{comment_id}', 'Categories\CategoriesController@update');
        Route::delete('/categories/{comment_id}', 'Categories\CategoriesController@destroy');

        /**
         * Posts Routes
         */
        Route::post('/posts', 'Posts\PostsController@store');
        Route::put('/posts/{post_id}', 'Posts\PostsController@update');
        Route::delete('/posts/{post_id}', 'Posts\PostsController@destroy');

        /**
         * Subscribers Routes
         */
        Route::get('/subscribers', 'Subscribers\SubscribersController@index');

        /**
         * Logs Routes
         */
        Route::get('/logs/search', 'Logs\LogsController@logs_by_user_id');
    });

    /**
     * Comments
     */
    Route::post('/comments/store', 'Comments\CommentsController@store');
    Route::put('/comments/{comment_id}', 'Comments\CommentsController@update');
    Route::delete('/comments/{comment_id}', 'Comments\CommentsController@destroy');
});



