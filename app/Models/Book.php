<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Book extends Model
{
    use HasFactory;

    protected $guarded = [];

    // /**
    //  * Get the route key for the model.
    //  *
    //  * @return string
    //  */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    public function users()
    {
        return $this->belongsToMany(User::class);
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
        return $this->whereHas('categories', function ($book) use ($cat) {
            $book->whereCategoryId($cat);
        })->whereStatus(1)->latest('updated_at')->take($take)->get();
    }

    public function getPicAttribute()
    {
        return $this->attributes['pic'] ? url("{$this->attributes['pic']}") : url('images/girl.jpg');
    }
}
