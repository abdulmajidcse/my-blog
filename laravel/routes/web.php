<?php

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\MediaController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Frontend\BlogController;
use App\Http\Controllers\Admin\BlogPostController;
use App\Http\Controllers\Admin\BlogCategoryController;
use App\Http\Controllers\Admin\HomeController as AdminHomeController;
use App\Http\Controllers\Frontend\HomeController as FrontendHomeController;


/**
 * Frontend Routes
 * For Guest
 */

Route::name('frontend.')->group(function () {

    Route::get('/', [FrontendHomeController::class, 'index'])->name('home');

    // search
    Route::get('search/{value}', [FrontendHomeController::class, 'search'])->name('search');

    /**
     * Frontend Blog Routes
     */
    Route::prefix('blog')->name('blog.')->group(function () {
        // all post
        Route::get('/', [BlogController::class, 'index'])->name('index');
        // all post by category
        Route::get('category/{slug}', [BlogController::class, 'postsByCategory'])->name('category');
        // single post
        Route::get('{slug}', [BlogController::class, 'singlePost'])->name('post');
    });
});

/**
 * Authenticate Routes
 * For Admin
 */

/**
 * Login, Register, Reset Password, Confirm Password and Verify Email Routes
 */
Route::prefix('auth')->group(function () {

    /**
     * Default Auth laravel/ui package
     * Auth System
     */
    Auth::routes(['register' => false]);


    /**
     * Authenticate Dashboard
     * Admin Controll Panel Routes
     */
    Route::name('admin.')->middleware('auth')->group(function () {
        // admin home route
        Route::get('/', [AdminHomeController::class, 'index'])->name('home');

        // admin profile route
        Route::get('profile', [AdminHomeController::class, 'editProfile'])->name('profile');
        Route::put('profile', [AdminHomeController::class, 'updateProfile'])->name('profile.update');

        // settings route
        Route::resource('settings', SettingController::class)->only(['index', 'store', 'update']);

        // name to slug convert route
        Route::post('create-slug', function (Request $request) {
            // return a slug in json format
            return response()->json(['slug' => Str::slug($request->name, '-')]);
        })->name('slug.create');

        // media store
        Route::get('media', [MediaController::class, 'index'])->name('media.index');
        Route::get('media/create', [MediaController::class, 'create'])->name('media.create');
        Route::post('media/store', [MediaController::class, 'store'])->name('media.store');
        Route::delete('media/{media}', [MediaController::class, 'destroy'])->name('media.destroy');

        // Blog Category Routes
        Route::resource('blog-categories', BlogCategoryController::class)->except(['show']);

        // Blog Post Routes
        Route::resource('blog-posts', BlogPostController::class)->except(['show']);

        /**
         * Trash Routes
         */
        Route::prefix('trash')->name('trash.')->group(function () {
            Route::prefix('blog')->name('blog.')->group(function () {
                Route::get('{type}', [TrashController::class, 'indexBlog'])->name('index');
                Route::get('{type}/{id}', [TrashController::class, 'restoreBlog'])->name('restore');
                Route::delete('{type}/{id}', [TrashController::class, 'permanentlyDestroyBlog'])->name('destroy');
            });
        });
    });
});
