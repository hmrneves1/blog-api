<?php

namespace App\Http\Controllers;

use App\Models\Api\v1\Categories\Categories;
use App\Models\Api\v1\Comments\PostsComments;
use App\Models\Api\v1\Posts\Posts;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Returns application statistics and user statistics
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function app_and_user_statistics()
    {
        // Get app post count
        $app_post_count = Posts::count();

        // Get most active user on posts
        $most_active_user_posts = User::withCount('posts')->latest('posts_count')->first();

        // Get app comments count
        $app_comments_count = PostsComments::count();

        // Get most active user on comments
        $most_active_user_comments = User::withCount('comments')->latest('comments_count')->first();

        // Get app categories count
        $app_categories_count = Categories::count();

        // Get most used category
        $most_used_category = Categories::withCount('posts')->latest('posts_count')->first();

        // Get user posts count
        $user_post_count = User::findOrFail(auth()->user()->user_id)->posts->count();

        // Get user comments count
        $user_comments_count = User::findOrFail(auth()->user()->user_id)->comments->count();

        return view('home')->with([
            'app_post_count' => $app_post_count,
            'most_active_user_posts' => $most_active_user_posts,
            'app_comments_count' => $app_comments_count,
            'most_active_user_comments' => $most_active_user_comments,
            'app_categories_count' => $app_categories_count,
            'most_used_category' => $most_used_category,
            'user_post_count' => $user_post_count,
            'user_comments_count' => $user_comments_count,
        ]);
    }

    /**
     * Returns only user statistics
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    private function user_statistics()
    {
        // Get user posts count
        $user_post_count = User::findOrFail(auth()->user()->user_id)->posts->count();

        // Get user comments count
        $user_comments_count = User::findOrFail(auth()->user()->user_id)->comments->count();

        return view('home', [
            'user_post_count' => $user_post_count,
            'user_comments_count' => $user_comments_count,
        ]);
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // If user is administrator, return app statistics and his/her statistics
        if (auth()->user()->group_id === 1)
        {
            return $this->app_and_user_statistics();
        }

        // If user isn't admin, return only user statistics
        return $this->user_statistics();
    }
}
