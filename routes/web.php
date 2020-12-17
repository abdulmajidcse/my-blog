<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Routes
 * For Guest
 */

Route::name('frontend.')->namespace('Frontend')->group(function() {
    Route::get('/', 'HomeController@index')->name('home');
});



/**
 * Authenticate Routes
 * For Admin
 */

/**
 * Login, Register, Reset Password, Confirm Password and Verify Email Routes
 */
Route::prefix('admin')->group(function() {
    
    /**
     * Default Auth laravel/ui package
     * Auth System
     */
    Auth::routes(['register' => false]);


    /**
     * Authenticate Dashboard
     * Admin Controll Panel Routes
     */
    Route::name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
        Route::get('/', 'HomeController@index')->name('home');

        // name to slug convert route
        Route::post('create-slug', function(Request $request) {
            // return a slug in json format
            return response()->json(['slug' => Str::slug($request->name, '-')]);
        })->name('slug.create');

        // Blog Category Routes
        Route::resource('blog-categories', 'BlogCategoryController')->except(['show']);

        // Blog Post Routes
        Route::resource('blog-posts', 'BlogPostController')->except(['show']);

    });


});
