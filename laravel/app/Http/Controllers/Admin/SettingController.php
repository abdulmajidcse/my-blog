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
            'app_description' => 'nullable|string',
            'app_logo'        => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'google_verification_code' => 'nullable|string',
            'bing_verification_code' => 'nullable|string',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $data = $request->all();

        // app logo upload and store name in table
        if($request->file('app_logo')) {
            $image = $request->file('app_logo');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $data['app_logo'] = $image_full_name;
        }

        // seo image upload and store name in table
        if($request->file('seo_image')) {
            $image = $request->file('seo_image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);
            // save name in table
            $data['seo_image'] = $image_full_name;
        }

        Setting::create($data);
        
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
            'app_description' => 'nullable|string',
            'app_logo'        => 'nullable|image|mimes: jpg,jpeg,png|max:5000',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'google_verification_code' => 'nullable|string',
            'bing_verification_code' => 'nullable|string',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|image|mimes:jpg,jpeg,png|max:5000',
        ]);

        $data = $request->all();

        // app logo upload and store name in table
        if($request->file('app_logo')) {
            $image = $request->file('app_logo');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);

            //delete old app_logo
            if($setting->app_logo && file_exists('uploads/'.$setting->app_logo)) {
                unlink('uploads/'.$setting->app_logo);
            }

            // save name in table
            $data['app_logo'] = $image_full_name;
        }

        // seo image upload and store name in table
        if($request->file('seo_image')) {
            $image = $request->file('seo_image');
            $image_name = uniqid() . time();
            $ext = strtolower($image->getClientOriginalExtension());
            $image_full_name = $image_name . "." . $ext;
            $upload_path = "uploads/";
            //upload file
            $image->move($upload_path, $image_full_name);

            //delete old seo_image
            if($setting->seo_image && file_exists('uploads/'.$setting->seo_image)) {
                unlink('uploads/'.$setting->seo_image);
            }

            // save name in table
            $data['seo_image'] = $image_full_name;
        }

        $setting->update($data);
        
        $request->session()->flash('message', 'Setting Saved.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }
}
