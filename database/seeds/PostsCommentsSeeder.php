<?php

use Illuminate\Database\Seeder;
use App\Models\Api\v1\Comments\PostsComments;

class PostsCommentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(PostsComments::class, 250)->create();
    }
}
