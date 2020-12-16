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

/**
 * Login, Register, Reset Password, Confirm Password and Verify Email Routes
 */
Route::prefix('admin')->group(function() {
    // Login
    Route::get('login', 'Auth\LoginController@showLoginForm')->name('login');
    Route::post('login', 'Auth\LoginController@login');
    Route::post('logout', 'Auth\LoginController@logout')->name('logout');

    // Password Reset
    Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
    Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
    Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
    Route::post('password/reset', 'Auth\ResetPasswordController@reset')->name('password.update');


    /**
     * Authenticate Dashboard
     * Admin Controll Panel Routes
     */
    Route::name('admin.')->namespace('Admin')->middleware('auth')->group(function() {
        Route::get('/', 'HomeController@index')->name('home');
    });


});
