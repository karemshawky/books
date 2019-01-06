<?php

use Faker\Generator as Faker;

$factory->define(App\Book::class, function (Faker $faker) {
    return [
        'title'       => $faker->words(4,true),
        'description' => $faker->text(60),
        'pic'         => null,
        'file'        => str_random(10),
        'status'      => 1,
        'views'       => null,
        'downloaded'  => null,
        'user_id'     => 1,
    ];
});
