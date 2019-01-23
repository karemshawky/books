<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function authors()
    {
        return $this->belongsToMany(Author::class);
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    /**
     *  Get Data to first Slider in index page.
     *
     * @return void
     */
    public function firstSlider()
    {
        return $this->whereStatus(1)->latest('updated_at')->take(6)->get();
    }
    
    /**
     * Get number of books from category.
     *
     * @param integer $cat Category ID
     * @param integer $take Limit 
     * @return void
     */
    public function getBooksFromCategory(int $cat, int $take)
    {
        return $this->whereHas('categories', function ($book) use($cat, $take) {
                                $book->whereCategoryId($cat);
                            })->whereStatus(1)->latest('updated_at')->take($take)->get();
    }

}
