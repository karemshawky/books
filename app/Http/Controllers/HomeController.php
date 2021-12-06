<?php

namespace App\Http\Controllers;

use App\Traits\MetaTags;
use Illuminate\Http\Request;
use App\Models\{Book, Author, Category};
use Artesaos\SEOTools\Facades\SEOMeta;
use Spatie\Sitemap\{Sitemap, Tags\Url};

class HomeController extends Controller
{
    use MetaTags;

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

        if (request()->wantsJson()) {
            return response()->json($data, 200);
        }

        $this->seoIndex();

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
        $book = Book::with('authors', 'categories', 'tags')->whereSlug($book)->firstOrFail();

        $category = $book->categories->first();
        $relatedBooks = Category::findOrFail($category->id)->books->take(4)->except($book->id);
        $metaDescription = removeStripTagsAndDecode($book->description);

        $this->seoSinglePage($book, $metaDescription, $category);

        return view('front.single', compact('book', 'relatedBooks'));
    }

    /**
     * All books page.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllBooks()
    {
        $books = Book::with('authors')->latest()->paginate(20);

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

        $category = $book->categories->firstOrFail();
        $relatedBooks = Category::findOrFail($category->id)->books->take(4)->except($book->id);
        $metaDescription = removeStripTagsAndDecode($book->description);

        $this->seoSinglePage($book, $metaDescription, $category);

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

        $this->seoAuthorOrCategory($author, $metaDescription);

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
        $metaDescription = removeStripTagsAndDecode($category->description);

        $this->seoAuthorOrCategory($category, $metaDescription);

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
                return $query->where('name', $word)->orWhere('name', word_rev($word));
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

    /**
     * Create XML Site Map
     *
     * @return void
     */
    public function createSiteMap()
    {
        $sitemap = Sitemap::create()->add(Url::create('/'))
            ->add(Url::create('/contactus'));

        Book::all()->each(function (Book $book) use ($sitemap) {
            $sitemap->add(Url::create("/books/{$book->slug}"));
        });

        Category::all()->each(function (Category $category) use ($sitemap) {
            $sitemap->add(Url::create("/cats/{$category->slug}"));
        });

        Author::all()->each(function (Author $author) use ($sitemap) {
            $sitemap->add(Url::create("/authors/{$author->slug}"));
        });

        $sitemap->writeToFile(public_path('sitemap.xml'));
    }
}
