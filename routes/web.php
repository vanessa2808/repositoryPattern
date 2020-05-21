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
Route::get('admin/blog/add_blog', ['as' => 'admin.blog.add_blog', 'uses' => 'Admin\BlogController@getAddBlog']);
Route::post('admin/blog/add_blog', ['as' => 'admin.blog.create', 'uses' => 'Admin\BlogController@postAddBlog']);
Route::get('admin/blog/list_blog', ['as' => 'admin.blog.list_blog', 'uses' => 'Admin\BlogController@index']);

Route::get('admin/blog/edit_blog/{id}', ['as' => 'admin.blog.edit_blog', 'uses' => 'Admin\BlogController@getEditBlog']);
Route::post('admin/blog/edit_blog/{id}', ['as' => 'admin.blog.edit_blog', 'uses' => 'Admin\BlogController@postEditBlog']);
Route::get('admin/blog/delete/{id}', ['as' => 'admin.blog.delete', 'uses' => 'Admin\BlogController@delete']);

Auth::routes();
