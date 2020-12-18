<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BlogCategory;

class BlogPostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogPosts = BlogPost::orderBy('id', 'desc')->get();
        return view('admin.blog_post.index', ['blogPosts' => $blogPosts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $blogCategories = BlogCategory::orderBy('name', 'asc')->get();
        return view('admin.blog_post.create', ['blogCategories' => $blogCategories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'blog_category_id' => 'required|numeric',
            'name'             => 'required|string|unique:blog_posts',
            'slug'             => 'required|string|unique:blog_posts',
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
            'content'          => 'required|string',
            'meta_keyword'     => 'required|string',
            'meta_description' => 'required|string',
        ],
        [
            'blog_category_id.required' => 'The post category field is required.',
            'blog_category_id.numeric' => 'The post category must be a number.',
        ]);

        $blogPost                   = new BlogPost();
        $blogPost->blog_category_id = $request->blog_category_id;
        $blogPost->name             = $request->name;
        $blogPost->slug             = $request->slug;
        $blogPost->content          = $request->content;
        $blogPost->meta_keyword     = $request->meta_keyword;
        $blogPost->meta_description = $request->meta_description;

        // image upload and store name in table
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $blogPost->image = $image_full_name;
        }

        $blogPost->save();
        
        $request->session()->flash('message', 'Blog Post Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogPost $blogPost)
    {
        $blogCategories = BlogCategory::orderBy('name', 'asc')->get();
        return view('admin.blog_post.edit', ['blogCategories' => $blogCategories, 'blogPost' => $blogPost]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogPost $blogPost)
    {
        $request->validate([
            'blog_category_id' => 'required|numeric',
            'name'             => 'required|string|unique:blog_posts,name,'.$blogPost->id,
            'slug'             => 'required|string|unique:blog_posts,slug,'.$blogPost->id,
            'image'            => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
            'content'          => 'required|string',
            'meta_keyword'     => 'required|string',
            'meta_description' => 'required|string',
        ],
        [
            'blog_category_id.required' => 'The post category field is required.',
            'blog_category_id.numeric' => 'The post category must be a number.',
        ]);

        $blogPost->blog_category_id = $request->blog_category_id;
        $blogPost->name             = $request->name;
        $blogPost->slug             = $request->slug;
        $blogPost->content          = $request->content;
        $blogPost->meta_keyword     = $request->meta_keyword;
        $blogPost->meta_description = $request->meta_description;

        // image upload and store name in table
        if($request->file('image')) {
            $image = $request->file('image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);

            //delete old image
            if(file_exists('assets/uploads/'.$blogPost->image)) {
                unlink('assets/uploads/'.$blogPost->image);
            }

            // save name in table
            $blogPost->image = $image_full_name;
        }

        $blogPost->save();
        
        $request->session()->flash('message', 'Blog Post Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogPost  $blogPost
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, BlogPost $blogPost)
    {
        $blogPost->delete();

        $request->session()->flash('message', 'Blog Post Deleted.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }
}
