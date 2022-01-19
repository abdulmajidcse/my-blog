<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use Illuminate\Support\Str;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
        $request->validate(
            [
                'blog_category_id' => 'required|numeric',
                'name'             => 'required|string|unique:blog_posts',
                'slug'             => 'required|string|unique:blog_posts',
                'image'            => 'nullable|url',
                'content'          => 'required|string',
                'seo_keyword'      => 'nullable|string',
                'seo_description'  => 'nullable|string',
            ],
            [
                'blog_category_id.required' => 'The post category field is required.',
                'blog_category_id.numeric'  => 'The post category must be a number.',
            ]
        );

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);

        if ($request->save_as_draft) {
            $data['status']  = 2;
        } else {
            $data['status']  = 1;
            $data['published_at'] = now();
        }

        BlogPost::create($data);

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
        // return $request;
        $request->validate(
            [
                'blog_category_id' => 'required|numeric',
                'name'             => 'required|string|unique:blog_posts,name,' . $blogPost->id,
                'slug'             => 'required|string|unique:blog_posts,slug,' . $blogPost->id,
                'image'            => 'nullable|url',
                'content'          => 'required|string',
                'seo_keyword'      => 'nullable|string',
                'seo_description'  => 'nullable|string',
            ],
            [
                'blog_category_id.required' => 'The post category field is required.',
                'blog_category_id.numeric'  => 'The post category must be a number.',
            ]
        );

        $data = $request->all();
        $data['slug'] = Str::slug($request->slug);

        if ($request->save_as_draft) {
            $data['status']  = 2;
        } else {
            $data['status']  = 1;
            !$blogPost->published_at && $data['published_at'] = now();
        }

        $blogPost->update($data);

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
