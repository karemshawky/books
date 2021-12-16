<?php

namespace App\Http\Controllers\Admin;

use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\{Book, Tag, Author, Category};

class BookController extends Controller
{
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
                return (empty($book->description)) ? '-' : removeStripTagsAndDecode(\Str::limit($book->description, 50));
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

        return view('backend.book.create', compact('tags', 'authors', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string',
            'link' => 'required|string',
            'slug' => 'required|string|unique:books,slug',
            'description' => 'required|string|string',
            'cover' => 'nullable|image|max:4000',
            'status' => 'required|boolean',
            'categories' => 'required',
            'categories.*' => 'array|string',
            'authors' => 'required',
            'authors.*' => 'array|string',
            'tags' => 'nullable',
            'tags.*' => 'array',
        ]);

        if ($request->file('cover')->isValid()) {
            $validated['cover'] = $request->cover->store('public/books');
        }

        $book = Book::create([
            'title' => $validated['title'],
            'slug' => make_slug($validated['slug'], '-'),
            'link' => $validated['link'],
            'description' => $validated['description'],
            'status' => $validated['status'],
            'cover' => "books/{$request->cover->hashName()}",
            'user_id' => auth()->id()
        ]);

        $book->tags()->attach($request->tags);
        $book->authors()->attach($request->authors);
        $book->categories()->attach($request->categories);

        return response()->json(['message' => 'تم تسجيل الكتاب بنجاح '], 201);
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

        return view('backend.book.edit', compact('book', 'tags', 'authors', 'categories', 'bookTags', 'bookAuthors', 'bookCategories'));
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
            'title' => 'required|string|unique:books,title,' . $book->id,
            'link' => 'required',
            'slug' => 'required',
            'description' => 'nullable|string',
            'cover' => 'nullable|image|max:4000',
            'category_id' => 'required',
            'author_id' => 'required',
        ]);

        $book->update([
            'title' => $request->title,
            'slug' => make_slug($request->slug, '-'),
            'link' => $request->file,
            'description' => $request->description,
            'status' => $request->status
        ]);

        $book->tags()->sync($request->tag_id);
        $book->authors()->sync($request->author_id);
        $book->categories()->sync($request->category_id);

        if ($request->file('cover')->isValid()) {

            if (File::exists($book->cover)) {
                File::delete($book->cover);
            }

            $validated['cover'] = $request->photo->store('books');
            $book->update(['cover' => $validated['cover']]);
        }

        return back()->with([
            'url'    => 'books.index',
            'type'   => 'success',
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

        if (File::exists($book->cover)) {
            File::delete($book->cover);
        }

        return back()->with([
            'type'   => 'success',
            'message' => 'تم حذف الكتاب بنجاح '
        ]);
    }
}
