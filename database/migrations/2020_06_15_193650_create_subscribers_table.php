<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscribersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_subscribers', function (Blueprint $table) {
            $table->bigIncrements('subscriber_id');
            $table->unsignedBigInteger('user_id')->nullable()->comment('If the user is registered, we save the user_id.');
            $table->string('name')->comment('Subscriber real name.');
            $table->string('email')->unique()->comment('Subscriber email address.');
            $table->string('token')->nullable()->comment('Token to unsubscribe.');
            $table->string('token_expire_date')->nullable()->comment('Token age.');
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
        Schema::dropIfExists('tbl_subscribers');
    }
}
