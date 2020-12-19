<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogPosts = BlogPost::orderBy('id', 'desc')->paginate(5);
        if(count($blogPosts) > 0) {
            return view('frontend.home', ['blogPosts' => $blogPosts]);
        } else {
            return view('errors.no_post');
        }
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search($value)
    {
        $blogPosts = BlogPost::where('name', 'LIKE', "%{$value}%")
            ->orWhere('slug', 'LIKE', "%{$value}%")
            ->orWhere('content', 'LIKE', "%{$value}%")
            ->orWhere('meta_keyword', 'LIKE', "%{$value}%")
            ->orWhere('meta_description', 'LIKE', "%{$value}%")
            ->orderBy('id', 'desc')->paginate(5);
        
        if(count($blogPosts) > 0) {
            return view('frontend.search', ['blogPosts' => $blogPosts, 'searchValue' => $value]);
        }

        return view('errors.no_post', ['searchValue' => $value]);
    }
}
