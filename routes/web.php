<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/**
 * Frontend Routes
 * For Guest
 */

Route::name('frontend.')->namespace('Frontend')->group(function() {
    // All blog posts
    Route::get('/', 'HomeController@index')->name('home');

    // search
    Route::get('search/{value}', 'HomeController@search')->where('value', '.*')->name('search');

    /**
     * Frontend Blog Routes
     */
    Route::prefix('blog')->name('blog.')->group(function() {
        // all post by category
        Route::get('category/{slug}', 'BlogController@postsByCategory')->name('category');
        // single post
        Route::get('{slug}', 'BlogController@singlePost')->name('post');
    });
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
        // admin home route
        Route::get('/', 'HomeController@index')->name('home');

        // admin profile route
        Route::get('profile', 'HomeController@editProfile')->name('profile');
        Route::put('profile', 'HomeController@updateProfile')->name('profile.update');

        // settings route
        Route::resource('settings', 'SettingController')->only(['index', 'store', 'update']);

        // name to slug convert route
        Route::post('create-slug', function(Request $request) {
            // return a slug in json format
            return response()->json(['slug' => Str::slug($request->name, '-')]);
        })->name('slug.create');

        // media store
        Route::get('media', 'MediaController@index')->name('media.index');
        Route::get('media/create', 'MediaController@create')->name('media.create');
        Route::post('media/store', 'MediaController@store')->name('media.store');
        Route::delete('media/{media}', 'MediaController@destroy')->name('media.destroy');

        // Blog Category Routes
        Route::resource('blog-categories', 'BlogCategoryController')->except(['show']);

        // Blog Post Routes
        Route::resource('blog-posts', 'BlogPostController')->except(['show']);

        /**
         * Trash Routes
         */
        Route::prefix('trash')->name('trash.')->group(function() {
            Route::prefix('blog')->name('blog.')->group(function() {
                Route::get('{type}', 'TrashController@indexBlog')->name('index');
                Route::get('{type}/{id}', 'TrashController@restoreBlog')->name('restore');
                Route::delete('{type}/{id}', 'TrashController@permanentlyDestroyBlog')->name('destroy');
            });
        });

    });


});