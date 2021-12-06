<?php

namespace Database\Factories;

use App\Models\Author;
use Illuminate\Database\Eloquent\Factories\Factory;

class AuthorFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Author::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'slug'    => make_slug($this->faker->name, '-'),
            'about'   => $this->faker->text(600),
            'pic'     => 'omar.jpg',
            'user_id' => 3,
            'status'  => 1
        ];
    }
}
