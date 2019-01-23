<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Category;

class HomeController extends Controller
{
    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book;

        $data['firstSlider']      = $book->firstSlider();
        $data['arabicStory']      = $book->getBooksFromCategory(1,12);
        $data['historicStory']    = $book->getBooksFromCategory(2,5);
        $data['humanDevelopment'] = $book->getBooksFromCategory(3,5);
        $data['translatedStory']  = $book->getBooksFromCategory(4,12);

        return view('front.index', compact('data'));
    }

    /**
     * Description page of the book.
     *
     * @param  $book
     * @return \Illuminate\Http\Response
     */
    public function getBook($book)
    {
        $book = Book::with('authors', 'categories', 'tags')->findOrFail($book);

        $categoryId = $book->categories->first()->id;
        $relatedBooks = Category::findOrFail($categoryId)->books->take(4)->except($book->id);

        return view('front.single', compact('book', 'relatedBooks'));
    }

    /**
     * All books page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBooks()
    {
        $books = Book::with('authors')->orderBy('updated_at', 'desc')->paginate(20);
        return view('front.allBooks', compact('books'));
    }

    /**
     * Reading the book online page.
     *
     * @param  $book
     * @return \Illuminate\Http\Response
     */
    public function getRead($book)
    {
        $book = Book::with('tags')->findOrFail($book);

        $categoryId = $book->categories->first()->id;
        $relatedBooks = Category::findOrFail($categoryId)->books->take(4)->except($book->id);

        return view('front.read', compact('book', 'relatedBooks'));
    }

    /**
     * All the books that reading online page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllReads()
    {
        $books = Book::with('authors')->orderBy('updated_at', 'desc')->paginate(20);
        return view('front.allBooks', compact('books'));
    }

    /**
    * Author page.
    *
    * @param  $author
    * @return \Illuminate\Http\Response
    */
    public function getAuthor($author)
    {
        $author = Author::with('books')->findOrFail($author);
        return view('front.author', compact('author'));
    }

    /**
     * All Authors page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllAuthors()
    {
        $authors = Author::paginate(20);
        return view('front.allAuthors', compact('authors'));
    }

    /**
     * Category page.
     *
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function getCategory($category)
    {
        $category = Category::findOrFail($category);
        $books = $category->books()->with('authors')->paginate(20);

        return view('front.category', compact('category', 'books'));
    }

    /**
     * Contact Us.
     *
     * @return \Illuminate\Http\Response
     */
    public function contact()
    {
        return view('front.contact');
    }

    
}
