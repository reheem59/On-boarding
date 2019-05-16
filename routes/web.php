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


Auth::routes(['verify' => true]);
// home page
Route::get('/home', 'HomeController@index')->name('home');

// profile
Route::get('/profile/{user_id}', 'UserController@index')->name('profile')->middleware('verified');
Route::post('/profile/{user_id}', 'UserController@update')->name('profile_update')->middleware('verified');

// department

Route::group(['middleware' => 'verified'], function(){

    Route::resource('departments','DepartmentController');

    
Route::get('discussion/create',[
'uses' => 'DiscussionController@create',
'as' => 'discussion.create'
    ]);

    Route::post('discussion/store',[

        'uses' => 'DiscussionController@store',
        'as' => 'discussion.store'
    ]);

}); 

Route::get('discussion', 'DiscussionController@index');
Route::get('discussion/{thread}', 'DiscussionController@show')->name('post');




