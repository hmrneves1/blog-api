<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsHasmanyCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_hasmany_categories', function (Blueprint $table) {
            $table->unsignedBigInteger('post_id')->comment("Related to PK of tbl_posts.post_id.");
            $table->unsignedBigInteger('category_id')->comment("Related to PK of tbl_posts_categories.category_id.");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts_hasmany_categories');
    }
}
