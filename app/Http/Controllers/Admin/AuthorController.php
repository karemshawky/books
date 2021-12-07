<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.author.show');
    }

    /**
     * Process ajax request to get all authors.
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAuthors()
    {
        return datatables(Author::with('user')->get())->addColumn('action', 'backend.author.action')
            ->editColumn('user_id', function ($author) {
                return $author->user->name;
            })
            ->editColumn('about', function ($author) {
                return removeStripTagsAndDecode(str_limit($author->about, 50));
            })
            ->editColumn('status', function ($author) {
                return ($author->status == 1) ? 'نشط' : 'غير نشط';
            })
            ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.author.create');
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
            'name'  => 'required|string|unique:authors',
            'slug'  => 'required|string',
            'about' => 'nullable|string',
            'pic'   => 'nullable|image|max:4000',
        ])->validated();

        if ($request->hasFile('pic')) {
            $validated['pic'] = $request->file('cover')->store('authors', 'public');
        }

        $author = Author::create([
            'name'    => $validated['name'],
            'slug'    => make_slug($validated['slug'], '-'),
            'about'   => $validated['about'],
            'pic'     => $validated['pic'],
            'user_id' => auth()->id(),
            'status'  => $validated['status']
        ]);


        return back()->with([
            'url'     => 'authors.index',
            'type'    => 'success',
            'message' => 'تم تسجيل المؤلف بنجاح '
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        return view('backend.author.read', compact('author'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit(Author $author)
    {
        return view('backend.author.edit', compact('author'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Author $author)
    {
        $request->validate([
            'name'  => 'required|string|unique:authors,name,' . $author->id,
            'slug'  => 'required|string',
            'about' => 'nullable|string',
            'pic'   => 'nullable|image|max:4000',
        ]);

        $author->update([
            'name'   => $request->name,
            'slug'   => make_slug($request->slug, '-'),
            'about'  => $request->about,
            'status' => $request->status
        ]);

        if ($request->hasFile('pic')) {
            if (File::exists($this->picPath . $author->pic) && $author->pic != 'no-image.png') {
                File::delete($this->picPath . $author->pic);
            }
            $picName = $this->upload->uploadImage($request, 'pic', $this->picPath, 640, 480);
            $author->update(['pic' => $picName]);
        }

        return back()->with([
            'url'     => 'authors.index',
            'type'    => 'success',
            'message' => 'تم تعديل بيانات المؤلف بنجاح '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Model\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        if (File::exists($this->picPath . $author->pic) && $author->pic != 'no-image.png') {
            File::delete($this->picPath . $author->pic);
        }

        $author->delete();

        return back()->with([
            'type'    => 'success',
            'message' => 'تم حذف المؤلف بنجاح'
        ]);
    }
}
