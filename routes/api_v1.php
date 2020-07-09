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
Route::get('/search/posts/by-keyword/{keyword}', 'Posts\PostsController@search_posts_by_keyword');
Route::get('/search/posts/by-category/{category_id}', 'Posts\PostsController@search_posts_by_category');

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
    Route::post('/auth/logout-all-devices', 'Auth\LogoutController@logout_all_devices');

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
        Route::get('/logs/search/{user_id}', 'Logs\LogsController@logs_by_user_id');

        /**
         * Administration Routes - Posts
         */
        Route::get('/administration/manage-posts/posts', 'Posts\PostsController@index');
        Route::get('/administration/manage-posts/pending-posts', 'Administration\Posts\ManagePostsController@pending_posts');
        Route::post('/administration/manage-posts/pending-posts/approve', 'Administration\Posts\ManagePostsController@approve_post');
        Route::post('/administration/manage-posts/pending-posts/delete', 'Administration\Posts\ManagePostsController@delete_pending_post');

        /**
         * Administration Routes - Comments
         */
        Route::get('/administration/manage-comments/pending-comments', 'Administration\Comments\ManageCommentsController@comments');
        Route::post('/administration/manage-comments/pending-comments/approve', 'Administration\Comments\ManageCommentsController@approve');
        Route::post('/administration/manage-comments/pending-comments/delete', 'Administration\Comments\ManageCommentsController@delete');

        /**
         * Administration Routes - Users
         */
        Route::get('/administration/manage-users/list-users', 'Administration\Users\UsersController@list_users');
        Route::get('/administration/manage-users/list-user-posts', 'Administration\Users\UsersController@list_user_posts');
        Route::get('/administration/manage-users/list-user-comments', 'Administration\Users\UsersController@list_user_comments');
        Route::post('/administration/manage-users/update-user-group', 'Administration\Users\UsersController@update_user_group');

        /**
         * Administration Routes - Groups
         */
        Route::get('/administration/manage-user-groups/list-groups', 'Administration\UserGroups\UserGroupsController@index');
    });

    /**
     * Comments
     */
    Route::post('/comments/store', 'Comments\CommentsController@store');
    Route::put('/comments/{comment_id}', 'Comments\CommentsController@update');
    Route::delete('/comments/{comment_id}', 'Comments\CommentsController@destroy');

    /**
     * Users
     */
    Route::get('/users/{user_id}', 'Users\UsersController@index');
    Route::post('/users/update-email', 'Users\UsersController@update_email');
    Route::post('/users/update-password', 'Users\UsersController@update_password');
    Route::post('/users/update-avatar', 'Users\UsersController@update_avatar');
});



