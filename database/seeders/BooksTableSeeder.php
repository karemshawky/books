<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\{Book, Tag, Author, Category};

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()->count(100)->create()->each(function ($book) {
            $book->authors()->saveMany(Author::all()->shuffle()->take(1));
            $book->categories()->saveMany(Category::all()->shuffle()->take(1));
            $book->tags()->saveMany(Tag::all()->shuffle()->take(4));
        });
    }
}
