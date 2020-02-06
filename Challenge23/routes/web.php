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

use App\Theme;
use App\Comment;

Route::get('/', function () {

    $themes = Theme::with("categories", "users")->get();
    $comments = Comment::with('users','themes')->get();

    return view('welcome',compact('themes','comments'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth','CheckUserRole']);
Route::get('/create','HomeController@create')->name('create');
Route::post('/create','HomeController@store')->name('store');
Route::get('/create/edit/{id}','HomeController@edit')->name('edit');
Route::post('/create/{id}','HomeController@update');
Route::get('/guest','HomeController@guest')->name('guest');
Route::get('/create/delete/{id}','HomeController@delete')->name('delete');

Route::get('/admin', 'AdminController@admin')->name('admin');
Route::post('/admin/comment','AdminController@store');
Route::get('/admin/approve','AdminController@adminApprove')->name('approve');
Route::get('/admin/approve/{id}','AdminController@approveTheme')->name('approvedTheme');
