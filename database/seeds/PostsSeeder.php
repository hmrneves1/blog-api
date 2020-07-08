<?php

use Illuminate\Database\Seeder;

use App\Models\Api\v1\Categories\Categories;
use App\Models\Api\v1\Posts\Posts;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Posts::class, 50)->create();

        // Get all the post categories
        $categories = Categories::all();

        // Populate the pivot table
        Posts::all()->each(function ($post) use ($categories) {
            $post->categories()->attach(
                $categories->random(rand(1, 18))->pluck('category_id')->toArray()
            );
        });
    }
}
