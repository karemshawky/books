<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use Yajra\Datatables\Datatables;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.category.show');
    }

    /**
     * Process ajax request to get all categories.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getData()
    {
        return datatables(Category::all())->addColumn('action', 'backend.category.action')
                                          ->editColumn('status', function (Category $category) { return ( $category->status == 1 ) ? 'نشط' : 'غير نشط'; })
                                          ->toJson();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.category.create');
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
            'name' => 'required|string',
            'slug' => 'required'
        ]);

        $category = Category::whereName($request->name)->exists();

        if ($category) {
            return back()->with([
                'url'     => 'cats.index',
                'type'    => 'error',
                'message' => 'أسم القسم موجود مسبقا'
            ]);
        }

        Category::create([ 'name' => $request->name,
                           'slug' => make_slug($request->slug, '-'),
                           'description' => $request->description,
                           'status' => $request->status
                         ]);

        return back()->with([
            'url'     => 'cats.index',
            'type'    => 'success',
            'message' => 'تم تسجيل القسم بنجاح '
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category)
    {
        $category = Category::findOrFail($category);
        return view('backend.category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category)
    {
        $request->validate([
            'name' => 'required|string|unique:categories,name,' . $category,
            'slug' => 'required'
        ]);

        Category::whereId($category)->first()->update([
            'name'   => $request->name,
            'slug'   => make_slug($request->slug, '-'),
            'description' => $request->description,
            'status' => $request->status
        ]);
        
        return back()->with([
            'url'     => 'cats.index',
            'type'    => 'success',
            'message' => 'تم تعديل القسم بنجاح '
        ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($category)
    {
        Category::destroy($category);

        return back()->with([
            'url'     => '',
            'type'    => 'success',
            'message' => 'تم حذف القسم بنجاح'
        ]);
    }
}
