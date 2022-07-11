<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/show_posts', 'BlogController@index');
Route::get('/create_post', 'BlogController@create');
Route::get('/postinsert', 'BlogController@store');
Route::get('/delete_post/{id}', 'BlogController@destroy');
Route::get('/update_post/{id}', 'BlogController@edit');
Route::get('/postupdate', 'BlogController@update');
Route::get('/post/{id}', 'BlogController@post');
Route::get('/adminlogin', 'AdminController@adminLoginPage');
Route::get('/loginadminC', 'AdminController@adminLogin');
Route::get('adminlogout', 'AdminController@adminLogout');
Route::get('admin_update_post', 'AdminController@updatePostPage');
Route::get('admin_update', 'AdminController@adminUpdatePost');

