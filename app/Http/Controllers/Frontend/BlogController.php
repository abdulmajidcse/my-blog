<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;

class BlogController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $blogPosts = BlogPost::where('status', 1)->latest('id')->paginate(24);
        if(count($blogPosts) > 0) {
            return view('frontend.blog.index', ['blogPosts' => $blogPosts]);
        }
        
        return view('frontend.post_not_found');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsByCategory($slug)
    {
        $blogCategory = BlogCategory::where('slug', $slug)->firstOrFail();
        $blogPosts = BlogPost::where('status', 1)
            ->where('blog_category_id', $blogCategory->id)
            ->latest('id')
            ->paginate(24);

        if(count($blogPosts) > 0) {
            return view('frontend.blog.posts_by_category', ['blogPosts' => $blogPosts, 'blogCategory' => $blogCategory]);
        }
        
        return view('frontend.post_not_found', ['blogCategory' => $blogCategory]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        return view('frontend.blog.single_post', ['blogPost' => $blogPost]);
    }
}
