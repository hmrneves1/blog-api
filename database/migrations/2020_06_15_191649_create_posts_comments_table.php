<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_posts_comments', function (Blueprint $table) {
            $table->bigIncrements('comment_id');
            $table->unsignedBigInteger('post_id')->comment('Foreign Key related to tbl_posts.post_id');
            $table->unsignedBigInteger('user_id')->comment('Who commented.');
            $table->text('comment')->comment('Comment.');
            $table->unsignedBigInteger('parent_id')->nullable()->comment('Parent associated to a comment. Basically a reply to a comment.');
            $table->tinyInteger('approved')->default(1)->comment('Flag to control if the comment is pending approval.');
            $table->timestamps();

            $table->index('approved');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_posts_comments');
    }
}
