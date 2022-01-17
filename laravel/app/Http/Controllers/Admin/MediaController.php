<?php

namespace App\Http\Controllers\Admin;

use App\Models\Media;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MediaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allMedia = Media::orderBy('id', 'desc')->paginate(50);
        return view('admin.media.index', ['allMedia' => $allMedia]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.media.create');
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
            'images.0'     => 'required',
            'images.*'     => 'required|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        // multiple image uploads and store
        foreach ($request->file('images') as $image) {
            $media = new Media();
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $media->name = $image_full_name;
            $media->save();
        }

        $request->session()->flash('message', 'Media Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Media  $media
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, Media $media)
    {
        //delete image
        if($media->name && file_exists('uploads/'.$media->name)) {
            echo 'uploads/'.$media->name;
            unlink('uploads/'.$media->name);
        }
        $media->delete();

        $request->session()->flash('message', 'Media Permanently Deleted.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }
}
