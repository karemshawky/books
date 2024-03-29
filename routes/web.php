<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    HomeController,
    Admin\DashboardController,
    Admin\CategoryController,
    Admin\AuthorController,
    Admin\TagController,
    Admin\BookController
};

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

Route::view('/', 'welcome');
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


//Backend Routes

Route::redirect('/admin', '/admin/home');
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'role:super|admin']], function () {

    Route::get('/home', [DashboardController::class, 'index'])->name('backHome');

    Route::resource('/cats', CategoryController::class);
    Route::get('get-all-categories', [CategoryController::class, 'getData'])->name('cats.get');

    Route::resource('/authors', AuthorController::class);
    Route::get('get-all-authors', [AuthorController::class, 'getAuthors'])->name('authors.get');

    Route::resource('/tags', TagController::class);
    Route::get('get-all-tags', [TagController::class, 'getTags'])->name('tags.get');

    Route::resource('/books', BookController::class);
    Route::get('get-all-books', [BookController::class, 'getBooks'])->name('books.get');
});

require __DIR__ . '/auth.php';
