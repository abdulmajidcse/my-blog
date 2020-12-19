<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\BlogPost;
use App\Models\BlogCategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $resultCount = [
            'users'          => User::count(),
            'blogCategories' => BlogCategory::count(),
            'blogPosts'      => BlogPost::count(),
            'trashes'         => BlogCategory::onlyTrashed()->count() + BlogPost::onlyTrashed()->count(),
        ];
        return view('admin.home', ['resultCount' => $resultCount]);
    }

    /**
     * Show edit profile form
     */
    public function editProfile()
    {
        return view('admin.edit_profile');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function updateProfile(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|email|unique:users,email,'.Auth::user()->id,
        ]);
        //save name and email
        $user = Auth::user();
        $user->name = $request->name;
        $user->email = $request->email;

        //if user want to change password
        if (!is_null($request->old_password)) {
            //validate password
            $validateData = $request->validate([
                'old_password' => 'required|min:8',
                'new_password' => 'required|confirmed|min:8',
            ]);
            //save user password
            if (Hash::check($request->old_password, Auth::user()->password)) {
                $user->password = Hash::make($request->new_password);
            } else {
                $request->session()->flash('message', 'Old password did not match!');
                $request->session()->flash('alert-type', 'error');
                return redirect()->back();
            }
        }
        $user->save();
        $request->session()->flash('message', 'Profile saved!');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }
}
