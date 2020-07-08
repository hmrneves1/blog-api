<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateForeignKeys extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tbl_users', function (Blueprint $table) {
            $table->foreign('group_id')->references('group_id')->on('tbl_users_groups')->onUpdate('cascade');
            $table->foreign('rank_id')->references('rank_id')->on('tbl_users_ranks')->onUpdate('cascade');
        });

        Schema::table('tbl_posts', function (Blueprint $table) {
            $table->foreign('user_id')->references('user_id')->on('tbl_users')->onUpdate('cascade');
        });

        Schema::table('tbl_posts_comments', function (Blueprint $table) {
            $table->foreign('post_id')->references('post_id')->on('tbl_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('tbl_users')->onUpdate('cascade');
            $table->foreign('parent_id')->references('comment_id')->on('tbl_posts_comments')->onDelete('cascade')->onUpdate('cascade');
        });

        Schema::table('tbl_unaccepted_comments', function (Blueprint $table) {
            $table->foreign('post_id')->references('post_id')->on('tbl_posts')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('user_id')->references('user_id')->on('tbl_users')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
