<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'about' => $faker->text,
        'pic' => null,
        'user_id' => 1,
        'status' => 1
    ];
});
