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


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin/blog/add_blog', 'Admin\BlogController@getAddBlog')->name('add_blog');
Route::post('/admin/blog/add_blog', 'Admin\BlogController@postAddBlog')->name('add_blog');

Auth::routes();
