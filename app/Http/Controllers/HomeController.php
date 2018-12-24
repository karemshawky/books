<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $counts = [
            'users'      => User::count(),
            'books'      => Book::count(),
            'authors'    => Author::count(),
            'categories' => Category::count()
        ];

        return view('backend.main',compact('counts'));
    }
}
