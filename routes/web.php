<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', 'AuthController@index')->name('index');

Route::middleware(['check_ajax'])->group(function () {
    Route::get('/login', 'AuthController@login')->name('login');
    Route::get('/register', 'AuthController@register')->name('register');
    Route::get('/home', 'AuthController@home');
    Route::get('/forgot-pass','AuthController@forgotPass')->name('password.request');
    Route::post('/change-password', 'AuthController@changePassword')->name('change-password');
    Route::post('/password-recovery', 'AuthController@passwordRecovery')->name('forgot-password');
    Route::post('/authenticate','AuthController@authenticate')->name('authenticate');
    Route::post('/perform-register','AuthController@performRegister')->name('perform-register');
    Route::get('/logout','AuthController@logOut')->name('logout');
    Route::get('/in','AuthController@in');
    Route::get('/out','AuthController@out');
});




