<?php

use App\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_users', function (Blueprint $table) {
            $table->bigIncrements('user_id');
            $table->string('name')->comment('User real name.');
            $table->string('user_name')->comment('Username.');
            $table->string('email')->unique()->comment('User email address.');
            $table->timestamp('email_verified_at')->nullable()->comment('When the user verified the email.');
            $table->string('password')->comment('User password.');
            $table->string('avatar')->default('default.png')->nullable()->comment('Avatar file name.');
            $table->string('bio', 512)->nullable()->comment('User biography.');
            $table->unsignedBigInteger('group_id')->default(2)->comment('Foreign key related to tbl_users_groups.group_id.');
            $table->unsignedBigInteger('rank_id')->default(1)->comment('Foreign key related to tbl_users_ranks.rank_id.');
            $table->rememberToken();
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
        Schema::dropIfExists('tbl_users');
    }
}
