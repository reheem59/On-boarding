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


    





//// THREADS
Route::get('Q&A/create', 'ThreadController@create')->name('qa.create');


//admin

    // department crud
    Route::get('departments','DepartmentController@index')->name('departments.index');
    Route::get('departments/create','DepartmentController@create')->name('departments.create');
    Route::post('departments','DepartmentController@store')->name('departments.store');
    Route::get('departments/edit/{id}','DepartmentController@edit')->name('departments.edit');
    Route::post('departments/update/{id}','DepartmentController@update')->name('departments.update');
    Route::delete('departments/delete/{id}','DepartmentController@destroy')->name('departments.destroy');


    Route::get('discussion/create',[
        'uses' => 'ThreadController@create',
        'as' => 'thread.create'
    ]);
    Route::post('discussion/store',[
        'uses' => 'ThreadController@store',

    ])->name('discussion.store');
});
Route::get('discussion', 'ThreadController@index')->name('thread.index');
Route::get('discussion/{thread}', 'ThreadController@show')->name('thread.show');

//Post per department

Route::get('content/{id}/post', 'ContentController@index')->name('content');
Route::get('content/create', 'ContentController@create');
Route::post('content/store',[
    'uses' => 'ContentController@store',
    'as' => 'content.store'
]);

//admin route function

Route::get('admin',function(){

    return view('admin.admin');
});
