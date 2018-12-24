<?php

namespace App\Http\Controllers;

use App\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.tag.show');
    }

    /**
     * Process ajax request to get all tags.
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTags()
    {
        return datatables(Tag::all())->addColumn('action', 'backend.tag.action')->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.tag.create');
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
            'name' => 'required|string|unique:tags',
        ]);

        Tag::create([
            'name' => $request->name
        ]);

        return back()->with([
            'url' => 'tags.index',
            'type' => 'success',
            'message' => 'تم تسجيل الكلمة المفتاحية بنجاح '
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        return view('backend.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $request->validate([
            'name' => 'required|string|unique:tags,name,' . $tag->id,
        ]);

        $tag->update([
            'name' => $request->name,
        ]);

        return back()->with([
            'url' => 'tags.index',
            'type' => 'success',
            'message' => 'تم تعديل الكلمة المفتاحية بنجاح '
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();

        return back()->with([
            'url' => '',
            'type' => 'success',
            'message' => 'تم حذف الكلمة المفتاحية بنجاح'
        ]);
    }
}
