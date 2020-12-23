<?php

namespace App\Http\Controllers\Admin;

use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TrashController extends Controller
{
    /**
     * Display litsening of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexBlog(Request $request, $type)
    {
        if($type == 'categories') {
            // category trash
            $blogCategories = BlogCategory::onlyTrashed()->orderBy('id', 'desc')->get();
            return view('admin.blog_category.trash_index', ['blogCategories' => $blogCategories]);
        } elseif ($type == 'posts') {
            // post trash
            $blogPosts = BlogPost::onlyTrashed()->orderBy('id', 'desc')->get();
            return view('admin.blog_post.trash_index', ['blogPosts' => $blogPosts]);
        } else {
            $request->session()->flash('message', 'Something Went Wrong.');
            $request->session()->flash('alert-type', 'warning');
            return redirect()->back();
        }
    }

    /**
     * Restore of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function restoreBlog(Request $request, $type, $id)
    {
        if($type == 'category') {
            // restore category
            $blogCategory = BlogCategory::onlyTrashed()->findOrFail($id);
            $blogCategory->restore();

            $request->session()->flash('message', 'Blog Category Restored.');
            $request->session()->flash('alert-type', 'success');
        } elseif ($type == 'post') {
            // restore post
            $blogPost = BlogPost::onlyTrashed()->findOrFail($id);
            $blogPost->restore();

            $request->session()->flash('message', 'Blog Post Restored.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('message', 'Something Went Wrong.');
            $request->session()->flash('alert-type', 'warning');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function permanentlyDestroyBlog(Request $request, $type, $id)
    {
        if($type == 'category') {
            // permanently delete category
            $blogCategory = BlogCategory::onlyTrashed()->findOrFail($id);
            $blogCategory->forceDelete();

            $request->session()->flash('message', 'Blog Category Permanently Deleted.');
            $request->session()->flash('alert-type', 'success');
        } elseif ($type == 'post') {
            // permanently delete post
            $blogPost = BlogPost::onlyTrashed()->findOrFail($id);

            //delete post image
            if($blogPost->image && file_exists('assets/uploads/'.$blogPost->image)) {
                unlink('assets/uploads/'.$blogPost->image);
            }

            $blogPost->forceDelete();

            $request->session()->flash('message', 'Blog Post Permanently Deleted.');
            $request->session()->flash('alert-type', 'success');
        } else {
            $request->session()->flash('message', 'Something Went Wrong.');
            $request->session()->flash('alert-type', 'warning');
        }

        return redirect()->back();
    }
}
