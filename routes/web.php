<?php

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
Auth::routes(['register' => false]);

Route::prefix('admin')->name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
    Route::get('home', 'HomeController@index')->name('home');
});
