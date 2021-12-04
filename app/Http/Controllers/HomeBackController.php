<?php

namespace App\Http\Controllers;

use App\{Book, User, Author, Category};

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

        return view('backend.main', compact('counts'));
    }
}
