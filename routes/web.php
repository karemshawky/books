<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Frontend Routes
Route::get('/', 'HomeController@index')->name('home');
Route::get('/books', 'HomeController@getAllBooks')->name('books');
Route::get('/books/{slug}', 'HomeController@getBook')->name('books.slug');
Route::get('/reads', 'HomeController@getAllReads')->name('reads');
Route::get('/reads/{slug}', 'HomeController@getRead')->name('reads.slug');
Route::get('/authors', 'HomeController@getAllAuthors')->name('authors');
Route::get('/authors/{slug}', 'HomeController@getAuthor')->name('authors.slug');
Route::get('/cats/{slug}', 'HomeController@getCategory')->name('cat');
Route::get('/contactus', 'HomeController@contact')->name('contact');
Route::get('/search', 'HomeController@search')->name('search');
Route::get('/tags/{word}', 'HomeController@searchByTags')->name('tags');
Route::get('/sitemap', 'HomeController@createSiteMap')->name('sitemaps');

//Backend Routes
Route::group(['prefix' => 'admin'], function () {

    Auth::routes();

    Route::get('/home', 'HomeBackController@index')->name('backHome');
    Route::resource('/cats', 'CategoryController');

    Route::get('get-all-categories', 'CategoryController@getData')->name('cats.get');
    Route::resource('/authors', 'AuthorController');

    Route::get('get-all-authors', 'AuthorController@getAuthors')->name('authors.get');
    Route::resource('/tags', 'TagController');

    Route::get('get-all-tags', 'TagController@getTags')->name('tags.get');
    Route::resource('/books', 'BookController');

    Route::get('get-all-books', 'BookController@getBooks')->name('books.get');
    Route::resource('/settings', 'SettingController')->only(['index', 'edit', 'update']);
});

// middleware(['auth', 'role:super|admin'])->
