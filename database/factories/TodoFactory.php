<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Todo;
use Faker\Generator as Faker;

$factory->define(Todo::class, function (Faker $faker) {
    return [
        'user_id' => rand(1,10),
        'name'    => $faker->name,
        'phone'   => $faker->e164PhoneNumber,
        'email'   => $faker->safeEmail,
        'address' => $faker->address,
        'age'     => rand(20,35),
        'image'   => 'https://loremflickr.com/640/360',
    ];
});
