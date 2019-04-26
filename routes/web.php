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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
// home page
Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');

// profile
Route::get('/profile/{user_id}', 'UserController@index')->name('profile')->middleware('auth');
Route::post('/profile/{user_id}', 'UserController@update')->name('profile_update')->middleware('auth');




