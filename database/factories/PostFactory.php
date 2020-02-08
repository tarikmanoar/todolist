<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id'=>rand(1,5),
        'title' => $faker->text(50),
        'content' => $faker->text(500),
        'thumbnail'=> "https://picsum.photos/1200/668"
    ];
});
