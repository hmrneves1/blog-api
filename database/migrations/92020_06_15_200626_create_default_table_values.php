<?php

use App\Models\Api\v1\Comments\AutoAcceptComments;
use App\Models\Api\v1\Posts\AutoAcceptPosts;
use App\User;
use App\UserGroup;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

class CreateDefaultTableValues extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Create default groups
        DB::table('tbl_users_groups')->insert([
            ['name' => 'Administrator', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Users', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create default categories
        DB::table('tbl_posts_categories')->insert([
            ['name' => 'PHP', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laravel', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Life', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Playstation', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'MySQL', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Games', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Development', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Ajax', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laracon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Twitter', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Xamp', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Github', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Laragon', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Bootstrap', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Templates', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Enduro', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Yamaha', 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Motocross', 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create default ranks
        DB::table('tbl_users_ranks')->insert([
            ['name' => 'Recruit', 'posts_count' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['name' => '1Y Student', 'posts_count' => 10, 'created_at' => now(), 'updated_at' => now()],
            ['name' => '2Y Student', 'posts_count' => 20, 'created_at' => now(), 'updated_at' => now()],
            ['name' => '3Y Student', 'posts_count' => 30, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Professional', 'posts_count' => 50, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'Expert', 'posts_count' => 100, 'created_at' => now(), 'updated_at' => now()],
            ['name' => 'God', 'posts_count' => 250, 'created_at' => now(), 'updated_at' => now()],
        ]);

        // Create default user
        DB::table('tbl_users')->insert([
            'name' => 'Administrator',
            'user_name' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'group_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // How many comment the user should have for his comments be auto accepted
        AutoAcceptComments::create([
            'min_comments' => 10,
        ]);

        // How many posts the user should have for his comments be auto accepted
        AutoAcceptPosts::create([
            'min_posts' => 3,
        ]);

        // Default Passport keys
        Artisan::call('passport:install');
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
