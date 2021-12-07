<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\{Book, User, Author, Category};

class DashboardController extends Controller
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
