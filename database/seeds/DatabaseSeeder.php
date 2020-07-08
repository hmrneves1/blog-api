<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Populate tbl_users
        $this->call(UserSeeder::class);

        // Populate tbl_posts
        $this->call(PostsSeeder::class);

        // Populate tbl_posts_comments
        $this->call(PostsCommentsSeeder::class);

        // Populate tbl_subscribers
        $this->call(SubscribersSeeder::class);
    }
}
