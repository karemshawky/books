<?php

namespace App\Http\Controllers;

use App\Book;
use App\Tag;
use App\Author;
use App\Category;
use Illuminate\Http\Request;
use App\Helpers\AllUploads as Upload;
use File;

class BookController extends Controller
{
    /**
     * Variable for upload files
     *
     * @var $upload
     */
    public $upload;

    /**
     * Variable for author picture path
     *
     * @var string
     */
    public $picPath;

    /**
     * __construct
     *
     * @param Upload $upload
     * @return void
     */
    public function __construct(Upload $upload)
    {
        $this->upload = $upload;
        $this->picPath = public_path('uploads/book/');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.book.show');
    }

    /**
     * Process ajax request to get all books.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getBooks()
    {
        return datatables(Book::with(['categories:name', 'authors:name'])->get())->addColumn('action', 'backend.book.action')
                                ->editColumn('categories', function ($book) {
                                    return $book->categories->implode('name', ' - ');
                                })->editColumn('authors', function ($book) {
                                    return $book->authors->implode('name', ' - ');
                                })->editColumn('description', function ($book) {
                                    return (empty($book->description)) ? '-' : removeStripTagsAndDecode(str_limit($book->description, 50));
                                })->editColumn('status', function ($book) {
                                    return ($book->status == 1) ? 'نشط' : 'غير نشط';
                                })->editColumn('date', function ($book) {
                                    return $book->created_at->diffForHumans();
                                })->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tags = Tag::all();
        $authors = Author::all();
        $categories = Category::all();
        return view('backend.book.create', compact('tags','authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|unique:books',
            'file'        => 'required',
            'slug'        => 'required',
            'description' => 'nullable|string',
            'pic'         => 'nullable|image|max:4000',
            'category_id' => 'required',
            'author_id'   => 'required',
        ]);

        $book = Book::create([
            'title'       => $request->title,
            'slug'        => make_slug($request->slug, '-'),
            'file'        => $request->file,
            'description' => $request->description,
            'status'      => $request->status,
            'pic'         => 'girl.jpg',
            'user_id'     => auth()->id()
        ]);

        $book->tags()->attach($request->tag_id);
        $book->authors()->attach($request->author_id);
        $book->categories()->attach($request->category_id);

        if ($request->hasFile('pic')) {
            $picName = $this->upload->uploadImage($request, 'pic', $this->picPath,600,800);
            $book->update(['pic' => $picName]);
        }
        return back()->with([
            'url'     => 'books.index',
            'type'    => 'success',
            'message' => 'تم تسجيل الكتاب بنجاح '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        return view('backend.book.read', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit(Book $book)
    {
        $tags = Tag::all();
        $authors = Author::all();
        $categories = Category::all();

        $bookTags = $book->tags->pluck('id')->all();
        $bookAuthors = $book->authors->pluck('id')->all();
        $bookCategories = $book->categories->pluck('id')->all();

        return view('backend.book.edit', compact('book', 'tags','authors', 'categories', 'bookTags', 'bookAuthors', 'bookCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        $request->validate([
            'title'       => 'required|string|unique:books,title,' . $book->id,
            'file'        => 'required',
            'slug'        => 'required',
            'description' => 'nullable|string',
            'pic'         => 'nullable|image|max:4000',
            'category_id' => 'required',
            'author_id'   => 'required',
        ]);

        $book->update([
            'title'       => $request->title,
            'slug'        => make_slug($request->slug, '-'),
            'file'        => $request->file,
            'description' => $request->description,
            'status'      => $request->status
        ]);

        $book->tags()->sync($request->tag_id);
        $book->authors()->sync($request->author_id);
        $book->categories()->sync($request->category_id);

        if ($request->hasFile('pic')) {
            if( File::exists($this->picPath . $book->pic) && $book->pic != 'girl.jpg' ) {
                File::delete($this->picPath . $book->pic);
            }
            $picName = $this->upload->uploadImage($request, 'pic', $this->picPath,600,800);
            $book->update(['pic' => $picName]);
        }
        return back()->with([
            'url'     => 'books.index',
            'type'    => 'success',
            'message' => 'تم تعديل الكتاب بنجاح '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        $book->delete();
        $book->tags()->detach();
        $book->authors()->detach();
        $book->categories()->detach();

        if(File::exists($this->picPath . $book->pic) && $book->pic != 'girl.jpg' ) {
            File::delete($this->picPath . $book->pic);
        }

        return back()->with([
            'type'    => 'success',
            'message' => 'تم حذف الكتاب بنجاح '
        ]);
    }
}
