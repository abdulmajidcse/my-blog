<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data['blogPosts'] = BlogPost::where('status', 1)->latest('published_at')->take(8)->get();
        $data['blogCategories'] = BlogCategory::latest('id')->get();

        return view('frontend.home', $data);
    }

     /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function search($value)
    {
        $blogPosts = BlogPost::where('status', 1)
            ->where('name', 'LIKE', "%{$value}%")
            ->orWhere('slug', 'LIKE', "%{$value}%")
            ->orWhere('content', 'LIKE', "%{$value}%")
            ->orWhere('seo_keyword', 'LIKE', "%{$value}%")
            ->orWhere('seo_description', 'LIKE', "%{$value}%")
            ->latest('id')->paginate(24);
        
        if(count($blogPosts) > 0) {
            $blogCategories = BlogCategory::latest('id')->get();
            return view('frontend.search', ['blogPosts' => $blogPosts, 'searchValue' => $value, 'blogCategories' => $blogCategories]);
        }

        return view('frontend.post_not_found', ['searchValue' => $value]);
    }
}
