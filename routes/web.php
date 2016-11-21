<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('/test','TestController@index');
Route::get('members', ['as' => 'members.index', 'uses' => 'MembersController@index']);
Route::get('members/create', ['as' => 'members.create', 'uses' => 'MembersController@create']);
Route::post('/members/store',['as' => 'members.store', 'uses' => 'MembersController@store']);


// Route::get('members/form', function() {
//     return view('members.form');
// });
