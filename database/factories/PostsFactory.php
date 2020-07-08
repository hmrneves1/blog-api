<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;
use \App\Models\Api\v1\Posts\Posts;

$factory->define(Posts::class, function (Faker $faker) {

    // generate a title
    $title = $faker->sentence(6) . " /" . $faker->numberBetween(0, 99999);

    // generate a slug based on the title
    $slug = Str::slug($title, '-');

    return [
        'user_id' => $faker->numberBetween(1, 10),
        'slug' => $slug,
        'title' => $title,
        'body' => $faker->sentence(100),
        'image' => 'default.png',
    ];
});
