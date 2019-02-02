<?php

namespace App\Http\Controllers;

use SEOMeta;
use OpenGraph;
//use Twitter;
use App\Book;
use App\Author;
use App\Category;
use App\Setting;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        SEOMeta::setCanonical(route('home'));
        SEOMeta::addMeta('language', 'AR');
        SEOMeta::addMeta('url', url()->current());
        OpenGraph::addProperty('locale', 'ar-AR');
        OpenGraph::addImage( route('home') . '/uploads/cover.jpg');
        OpenGraph::setUrl( url()->current() );
    }
    /**
     * Show the application index page.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $book = new Book;

        $data['firstSlider'] = $book->firstSlider();
        $data['arabicStory'] = $book->getBooksFromCategory(1, 12);
        $data['historicStory'] = $book->getBooksFromCategory(2, 5);
        $data['humanDevelopment'] = $book->getBooksFromCategory(3, 5);
        $data['translatedStory'] = $book->getBooksFromCategory(4, 12);

        $moreCategory = Category::findOrFail([1, 2, 3, 4]);

        return view('front.index', compact('data', 'moreCategory'));
    }

    /**
     * Description page of the book.
     *
     * @param  $book
     * @return \Illuminate\Http\Response
     */
    public function getBook($book)
    {
        $book = Book::with('authors', 'categories', 'tags')->whereSlug($book)->firstOrFail();

        $categoryId = $book->categories->first()->id;
        $relatedBooks = Category::findOrFail($categoryId)->books->take(4)->except($book->id);
        $metaDescription = removeStripTagsAndDecode($book->description);

        SEOMeta::setTitle($book->title);
        SEOMeta::setDescription($metaDescription);
        SEOMeta::addKeyword( array_pluck($book->tags, 'name') );
        SEOMeta::addMeta('topic', $book->title);
        OpenGraph::setTitle($book->title);
        OpenGraph::setDescription($metaDescription);
        OpenGraph::addImage( route('home') . '/uploads/book/' . $book->pic);

        return view('front.single', compact('book', 'relatedBooks'));
    }

    /**
     * All books page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBooks()
    {
        $books = Book::with('authors')->latest('updated_at')->paginate(20);
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
        $book = Book::with('tags')->whereSlug($book)->firstOrFail();

        $categoryId = $book->categories->first()->id;
        $relatedBooks = Category::findOrFail($categoryId)->books->take(4)->except($book->id);
        $metaDescription = removeStripTagsAndDecode($book->description);

        SEOMeta::setTitle($book->title);
        SEOMeta::setDescription($metaDescription);
        SEOMeta::addKeyword( array_pluck($book->tags, 'name') );
        SEOMeta::addMeta('topic', $book->title);
        OpenGraph::setTitle($book->title);
        OpenGraph::setDescription($metaDescription);
        OpenGraph::addImage( route('home') . '/uploads/book/' . $book->pic);

        return view('front.read', compact('book', 'relatedBooks'));
    }

    /**
     * All the books that reading online page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllReads()
    {
        $books = Book::with('authors')->latest('updated_at')->paginate(20);
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
        $author = Author::with('books')->whereSlug($author)->firstOrFail();
        $metaDescription = removeStripTagsAndDecode($author->description);

        SEOMeta::setTitle($author->name);
        SEOMeta::setDescription($metaDescription);
        SEOMeta::addMeta('topic', $author->name);
        OpenGraph::setTitle($author->name);
        OpenGraph::setDescription($metaDescription);
        OpenGraph::addImage( route('home') . '/uploads/author/' . $author->pic);

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
        $category = Category::whereSlug($category)->firstOrFail();
        $books = $category->books()->with('authors')->paginate(20);
        return view('front.category', compact('category', 'books'));
    }

    /**
     * Search page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $request->validate(['word' => 'required|string']);
        $word = $request->word;

        $books = Book::with('authors')->where('title', 'like', '%' . $word . '%')
                            ->orWhereHas('tags', function ($query) use ($word) {
                                return $query->where('name', $word);
                            })->whereStatus(1)
                            ->latest('updated_at')
                            ->paginate(20)
                            ->appends($request->except('page'));

        SEOMeta::setTitle($word);

        return view('front.search', compact('books', 'word'));
    }

    /**
     * Search page.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function searchByTags(Request $request)
    {
        $word = $request->word;

        $books = Book::with('authors')->WhereHas('tags', function ($query) use ($word) {
            return $query->where('name', $word);
        })->whereStatus(1)
                            ->latest('updated_at')
                            ->paginate(20)
                            ->appends($request->except('page'));
                            
        SEOMeta::setTitle($word);

        return view('front.tag', compact('books', 'word'));
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
