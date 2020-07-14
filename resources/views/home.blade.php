@extends('layouts.app')

@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Application Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome back {{ auth()->user()->name }}!
                </div>
            </div>
        </div>
    </div>

    <br />
    <hr />
    <br />

    <div class="row">
        @isset($app_post_count)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        App Post Count<br />
                        <hr />
                        {{ $app_post_count }} posts
                    </div>
                </div>
            </div>
        @endisset
        @isset($most_active_user_posts)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        Most Active User on Posts<br />
                        <hr />
                        {{ $most_active_user_posts->name }} <i><b>user_id {{ $most_active_user_posts->user_id }}</b></i>
                    </div>
                </div>
            </div>
        @endisset
        @isset($app_comments_count)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        App Comments Count<br />
                        <hr />
                        {{ $app_comments_count }} comments
                    </div>
                </div>
            </div>
        @endisset
        @isset($most_active_user_comments)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        Most Active User on Comments<br />
                        <hr />
                        {{ $most_active_user_comments->name }} <i><b>user_id {{ $most_active_user_comments->user_id }}</b></i>
                    </div>
                </div>
            </div>
        @endisset
        @isset($app_categories_count)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        App Categories Count<br />
                        <hr />
                        {{ $app_categories_count }} categories
                    </div>
                </div>
            </div>
        @endisset
        @isset($most_used_category)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        Most Used Category<br />
                        <hr />
                        {{ $most_used_category->name }}
                    </div>
                </div>
            </div>
        @endisset
    </div>

    <br />
    <hr />
    <br />

    <div class="row">
        @isset($user_post_count)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        Personal Post Count<br />
                        <hr />
                        {{ $user_post_count }} posts
                    </div>
                </div>
            </div>
        @endisset

        @isset($user_comments_count)
            <div class="col-md-3">
                <div class="card">
                    <div class="card-body">
                        Personal Post Count<br />
                        <hr />
                        {{ $user_comments_count }} comments
                    </div>
                </div>
            </div>
        @endisset
    </div>

</div>
@endsection
