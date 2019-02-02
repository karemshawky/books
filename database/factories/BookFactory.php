<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'       => $faker->words(4,true),
        'slug'        => make_slug($faker->words(4,true), '-'),
        'description' => $faker->text(600),
        'pic'         => 'girl.jpg',
        'file'        => '1iTNlgqlY4xJXKQrbjRhJ9XuT6_ZdUApR',
        'status'      => 1,
        'downloaded'  => null,
        'user_id'     => 1,
    ];
});