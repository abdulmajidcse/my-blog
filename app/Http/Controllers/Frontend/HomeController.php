<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
        $blogPosts = BlogPost::where('status', 1)->latest('id')->take(6)->get();
        return view('frontend.home', ['blogPosts' => $blogPosts]);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search($value)
    {
        $blogPosts = BlogPost::where('status', 1)
            ->orWhere('name', 'LIKE', "%{$value}%")
            ->orWhere('slug', 'LIKE', "%{$value}%")
            ->orWhere('content', 'LIKE', "%{$value}%")
            ->orWhere('seo_keyword', 'LIKE', "%{$value}%")
            ->orWhere('seo_description', 'LIKE', "%{$value}%")
            ->latest('id')->paginate(24);
        
        if(count($blogPosts) > 0) {
            return view('frontend.search', ['blogPosts' => $blogPosts, 'searchValue' => $value]);
        }

        return view('frontend.post_not_found', ['searchValue' => $value]);
    }
}
