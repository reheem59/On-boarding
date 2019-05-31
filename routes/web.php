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


    







//admin

    // department crud
    Route::get('departments','DepartmentController@index')->name('departments.index');
    Route::get('departments/create','DepartmentController@create')->name('departments.create');
    Route::post('departments','DepartmentController@store')->name('departments.store');
    Route::get('departments/edit/{id}','DepartmentController@edit')->name('departments.edit');
    Route::post('departments/update/{id}','DepartmentController@update')->name('departments.update');
    Route::post('departments/delete/{id}','DepartmentController@destroy')->name('departments.destroy');


    Route::get('thread/create',[
        'uses' => 'ThreadController@create',
        'as' => 'thread.create'
    ]);
    Route::post('thread/store',[
        'uses' => 'ThreadController@store',

    ])->name('qa.store');
});
Route::get('thread', 'ThreadController@index')->name('thread.index');
Route::get('thread/show/{id}', 'ThreadController@show');
Route::get('/thread/fetch_data', 'ThreadController@fetch_data')->middleware('auth');
Route::get('thread/{thread}', 'ThreadController@show')->name('thread.show');

//Post per department

Route::get('content/{id}/post', 'ContentController@index')->name('content.index');
Route::get('content/create', 'ContentController@create')->name('content.create');
Route::get('content/show/{id}', 'ContentController@show')->name('content.show');

Route::post('content/store',[
    'uses' => 'ContentController@store',
    'as' => 'content.store'
]);
Route::get('content/list',[
    'uses' => 'ContentController@list',
    'as' => 'content.list'
]);
Route::post('content/update/{id}','ContentController@update')->name('content.update');
Route::delete('content/delete/{id}','ContentController@destroy')->name('content.destroy');
//admin route function

Route::get('admin','DepartmentController@index')->name('admin');


//
