<?php

use Illuminate\Database\Seeder;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Book::Class, 10)->create()->each(function ($book) {
            $book->authors()->saveMany(App\Author::all()->shuffle()->take(2));
            $book->categories()->saveMany(App\Author::all()->shuffle()->take(3));
            $book->tags()->saveMany(App\Author::all()->shuffle()->take(4));
        });
    }
}
