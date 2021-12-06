<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

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

Route::view('/', 'welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

//Frontend Routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/books', [HomeController::class, 'getAllBooks'])->name('books');
Route::get('/books/{slug}', [HomeController::class, 'getBook'])->name('books.slug');
Route::get('/reads', [HomeController::class, 'getAllReads'])->name('reads');
Route::get('/reads/{slug}', [HomeController::class, 'getRead'])->name('reads.slug');
Route::get('/authors', [HomeController::class, 'getAllAuthors'])->name('authors');
Route::get('/authors/{slug}', [HomeController::class, 'getAuthor'])->name('authors.slug');
Route::get('/cats/{slug}', [HomeController::class, 'getCategory'])->name('cat');
Route::get('/contactus', [HomeController::class, 'contact'])->name('contact');
Route::get('/search', [HomeController::class, 'search'])->name('search');
Route::get('/tags/{word}', [HomeController::class, 'searchByTags'])->name('tags');
Route::get('/sitemap', [HomeController::class, 'createSiteMap'])->name('sitemaps');

// //Backend Routes
// Route::middleware(['auth', 'role:super|admin'])->group(['prefix' => 'admin'], function () {

//     Route::get('/home', 'HomeBackController@index')->name('backHome');
//     Route::resource('/cats', 'CategoryController');

//     Route::get('get-all-categories', 'CategoryController@getData')->name('cats.get');
//     Route::resource('/authors', 'AuthorController');

//     Route::get('get-all-authors', 'AuthorController@getAuthors')->name('authors.get');
//     Route::resource('/tags', 'TagController');

//     Route::get('get-all-tags', 'TagController@getTags')->name('tags.get');
//     Route::resource('/books', 'BookController');

//     Route::get('get-all-books', 'BookController@getBooks')->name('books.get');
//     Route::resource('/settings', 'SettingController')->only(['index', 'edit', 'update']);
// });

require __DIR__ . '/auth.php';
