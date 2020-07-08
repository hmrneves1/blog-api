<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersRanksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users_ranks', function (Blueprint $table) {
            $table->bigIncrements('rank_id');
            $table->string('name')->comment('Rank name.');
            $table->unsignedBigInteger('posts_count')->comment('Number of accepted posts required to reach a certain rank.');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tbl_users_ranks');
    }
}
