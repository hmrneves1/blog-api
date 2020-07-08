<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */


use App\Models\Api\v1\Comments\PostsComments;
use Faker\Generator as Faker;

$factory->define(PostsComments::class, function (Faker $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 50),
        'user_id' => $faker->numberBetween(1, 15),
        'comment' => $faker->sentence(50),
    ];
});
