<?php

namespace Database\Factories;

use App\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title'       => $this->faker->words(4, true),
            'slug'        => make_slug($this->faker->words(4, true), '-'),
            'description' => $this->faker->text(600),
            'cover'         => null,
            'link'        => '1iTNlgqlY4xJXKQrbjRhJ9XuT6_ZdUApR',
            'status'      => true,
            'downloaded'  => 0,
            'user_id'     => 1
        ];
    }
}
