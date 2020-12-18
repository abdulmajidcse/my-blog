<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\BlogCategory;
use App\Models\BlogPost;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function postsByCategory($slug)
    {
        $blogCategory = BlogCategory::where('slug', $slug)->first();
        if($blogCategory) {
            $blogPosts = BlogPost::where('blog_category_id', $blogCategory->id)->orderBy('id', 'desc')->paginate(3);
            return view('frontend.blog.posts_by_category', ['blogPosts' => $blogPosts, 'blogCategory' => $blogCategory]);
        }
        return view('errors.404');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function singlePost($slug)
    {
        $blogPost = BlogPost::where('slug', $slug)->first();
        if($blogPost) {
            return view('frontend.blog.single_post', ['blogPost' => $blogPost]);
        }
        return view('errors.404');
    }
}
