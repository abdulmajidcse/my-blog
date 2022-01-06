<?php

namespace App\Http\Controllers\Frontend;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
            $blogCategories = BlogCategory::latest('id')->get();
            return view('frontend.blog.index', ['blogPosts' => $blogPosts, 'blogCategories' => $blogCategories]);
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
            $blogCategories = BlogCategory::latest('id')->get();
            return view('frontend.blog.posts_by_category', ['blogPosts' => $blogPosts, 'blogCategory' => $blogCategory, 'blogCategories' => $blogCategories]);
        }
        
        return abort(404, 'Not Found');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        if (Auth::check()) {
            $blogPost = BlogPost::where('slug', $slug)->firstOrFail();
        } else {
            $blogPost = BlogPost::where('status', 1)->where('slug', $slug)->firstOrFail();
        }
        
        $blogPosts = BlogPost::where('status', 1)
            ->where('blog_category_id', $blogPost->blog_category_id)
            ->where('id', '!=', $blogPost->id)
            ->latest('id')
            ->take(6)->get();
        $blogCategories = BlogCategory::latest('id')->get();
        return view('frontend.blog.single_post', ['blogPost' => $blogPost, 'blogPosts' => $blogPosts, 'blogCategories' => $blogCategories]);
    }
}
