<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resultCount = [
            'users'          => User::count(),
            'blogCategories' => BlogCategory::count(),
            'blogPosts'      => BlogPost::count(),
            'trashes'         => BlogCategory::onlyTrashed()->count() + BlogPost::onlyTrashed()->count(),
        ];
        return view('admin.home', ['resultCount' => $resultCount]);
    }
}
