<?php

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

Route::get('/', function () {
    return view('welcome');
});

//Backend Routes
Route::group(['prefix' => 'admin'], function () {
    Auth::routes();
    Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'role:super|admin']);

    Route::resource('/cats', 'CategoryController')->middleware(['auth', 'role:super|admin']);
    Route::get('get-all-categories', 'CategoryController@getData')->middleware(['auth', 'role:super|admin'])->name('cats.get');

    Route::resource('/authors', 'AuthorController')->middleware(['auth', 'role:super|admin']);
    Route::get('get-all-authors', 'AuthorController@getAuthors')->middleware(['auth', 'role:super|admin'])->name('authors.get');

    Route::resource('/tags', 'TagController')->middleware(['auth', 'role:super|admin']);
    Route::get('get-all-tags', 'TagController@getTags')->middleware(['auth', 'role:super|admin'])->name('tags.get');

    Route::resource('/books', 'BookController')->middleware(['auth', 'role:super|admin']);
    Route::get('get-all-books', 'BookController@getBooks')->middleware(['auth', 'role:super|admin'])->name('books.get');
});
