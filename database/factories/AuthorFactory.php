<?php

use Faker\Generator as Faker;

$factory->define(App\Author::class, function (Faker $faker) {
    return [
        'name'    => $faker->name,
        'slug'    => make_slug($faker->name, '-'),
        'about'   => $faker->text(600),
        'pic'     => 'omar.jpg',
        'user_id' => 1,
        'status'  => 1
    ];
});
