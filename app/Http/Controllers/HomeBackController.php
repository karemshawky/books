<?php

namespace App\Http\Controllers;

use App\Author;
use App\Book;
use App\Category;
use App\User;

class HomeBackController extends Controller
{
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
