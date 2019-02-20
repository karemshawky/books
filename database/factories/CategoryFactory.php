<?php

use Faker\Generator as Faker;

$factory->define(App\Category::class, function (Faker $faker) {
    return [
        'name'        => $faker->name,
        'slug'        => make_slug($faker->name, '-'),
        'description' => $faker->text,
        'status'      => 1
    ];
});
