<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAutoAcceptCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_auto_accept_comments', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('min_comments')->comment('Minimum required comments to auto accept comments.');
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
        Schema::dropIfExists('tbl_auto_accept_comments');
    }
}
