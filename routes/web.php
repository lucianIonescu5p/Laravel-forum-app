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

Route::get('/login', 'HomeController@index')->name('home');
Route::get('/', 'CategoryController@index');
Route::post('/comment', 'PostController@store');
Route::post('/thread', 'ThreadController@store');
Route::post('/category', 'CategoryController@store')->middleware('admin.auth');
Route::get('/{category}', 'CategoryController@show');
Route::get('/{category}/{thread}', 'ThreadController@show');

Auth::routes();
