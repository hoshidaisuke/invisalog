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

Route::get('/', 'PostsController@index');
Route::group(['prefix' => 'mypage', 'middleware' => 'auth'] , function() {
  Route::get('index', 'UserController@index')->name('mypage.index');
  Route::get('create', 'UserController@create')->name('mypage.create');
  Route::post('store', 'UserController@store')->name('mypage.store');
});
Route::group(['middleware' => ['auth']], function () {
  Route::resource('posts', 'PostsController', ['only' => ['store', 'destroy']]);
});
Auth::routes();

