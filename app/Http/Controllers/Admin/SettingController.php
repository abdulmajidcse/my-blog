<?php

namespace App\Http\Controllers\Admin;

use App\Models\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $setting = Setting::first();
        if($setting) {
            return view('admin.setting.edit', ['setting' => $setting]);
        }

        return view('admin.setting.create');
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
            'app_name'        => 'required|string',
            'app_title'       => 'required|string',
            'app_logo'        => 'nullable|image|mimes: jpg,jpeg,png|max:5000',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $setting                  = new Setting();
        $setting->app_name        = $request->app_name;
        $setting->app_title       = $request->app_title;
        $setting->facebook_link   = $request->facebook_link;
        $setting->youtube_link    = $request->youtube_link;
        $setting->linkedin_link   = $request->linkedin_link;
        $setting->github_link     = $request->github_link;
        $setting->twitter_link    = $request->twitter_link;
        $setting->seo_keyword     = $request->seo_keyword;
        $setting->seo_description = $request->seo_description;

        // app logo upload and store name in table
        if($request->file('app_logo')) {
            $image = $request->file('app_logo');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $setting->app_logo = $image_full_name;
        }

        // seo image upload and store name in table
        if($request->file('seo_image')) {
            $image = $request->file('seo_image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $setting->seo_image = $image_full_name;
        }

        $setting->save();
        
        $request->session()->flash('message', 'Setting Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        $request->validate([
            'app_name'        => 'required|string',
            'app_title'       => 'required|string',
            'app_logo'        => 'nullable|image|mimes: jpg,jpeg,png|max:5000',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $setting->app_name        = $request->app_name;
        $setting->app_title       = $request->app_title;
        $setting->facebook_link   = $request->facebook_link;
        $setting->youtube_link    = $request->youtube_link;
        $setting->linkedin_link   = $request->linkedin_link;
        $setting->github_link     = $request->github_link;
        $setting->twitter_link    = $request->twitter_link;
        $setting->seo_keyword     = $request->seo_keyword;
        $setting->seo_description = $request->seo_description;

        // app logo upload and store name in table
        if($request->file('app_logo')) {
            $image = $request->file('app_logo');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);

            //delete old app_logo
            if(file_exists('assets/uploads/'.$setting->app_logo)) {
                unlink('assets/uploads/'.$setting->app_logo);
            }

            // save name in table
            $setting->app_logo = $image_full_name;
        }

        // seo image upload and store name in table
        if($request->file('seo_image')) {
            $image = $request->file('seo_image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "assets/uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);

            //delete old seo_image
            if(file_exists('assets/uploads/'.$setting->seo_image)) {
                unlink('assets/uploads/'.$setting->seo_image);
            }

            // save name in table
            $setting->seo_image = $image_full_name;
        }

        $setting->save();
        
        $request->session()->flash('message', 'Setting Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }
}
