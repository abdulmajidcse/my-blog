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
        if ($setting) {
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
            'app_logo'        => 'nullable|url',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'google_verification_code' => 'nullable|string',
            'bing_verification_code' => 'nullable|string',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|url',
        ]);

        $data = $request->all();
        Setting::create($data);

        return redirect()->back()->with(['alert-type' => 'success', 'message' => 'Setting updated.']);
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
            'app_logo'        => 'nullable|url',
            'facebook_link'   => 'nullable|url',
            'youtube_link'    => 'nullable|url',
            'linkedin_link'   => 'nullable|url',
            'github_link'     => 'nullable|url',
            'twitter_link'    => 'nullable|url',
            'google_verification_code' => 'nullable|string',
            'bing_verification_code' => 'nullable|string',
            'seo_keyword'     => 'nullable|string',
            'seo_description' => 'nullable|string',
            'seo_image'       => 'nullable|url',
        ]);

        $data = $request->all();
        $setting->fill($data)->save();

        return redirect()->back()->with(['alert-type' => 'success', 'message' => 'Setting updated.']);
    }
}
