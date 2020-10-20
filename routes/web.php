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

use Illuminate\Support\Facades\Route;

Route::get('/', 'NoticeController@index')->name('home');
Route::view('forbidden', 'layouts.forbidden')->name('forbiddenRoute');
Route::get('admin', 'Admin\DashboardController@index')->name('admin.index')->middleware('auth');
Route::get('admin/logs', 'Admin\LogsController@index')->name('admin.logs.index')->middleware('auth');

// -----------------------------------  Post Routes ------------------------------------

Route::prefix('admin/post')->middleware('auth')->group(function (){
    Route::get('/', 'Admin\PostController@index')->name('admin.post.index');
    Route::get('create', 'Admin\PostController@create')->name('admin.post.create');
    Route::post('create', 'Admin\PostController@store')->name('admin.post.store');
    Route::get('edit/{id}', 'Admin\PostController@edit')->name('admin.post.edit');
    Route::post('edit', 'Admin\PostController@update')->name('admin.post.update');
    Route::get('delete/{id}', 'Admin\PostController@destroy')->name('admin.post.destroy');
});
Route::get('blog', 'BlogController@index')->name('blog');
Route::get('post/{slug}', 'BlogController@show')->name('post.show');

// -----------------------------------  Contact Routes ------------------------------------

Route::prefix('admin/contact')->middleware('auth')->group(function (){
    Route::get('/', 'Admin\ContactController@index')->name('admin.contact.index');
    Route::get('delete/{id}', 'Admin\ContactController@destroy')->name('admin.contact.destroy');
    Route::get('show/{id}', 'Admin\ContactController@show')->name('admin.contact.show');
    Route::post('answer/{id}', 'Admin\ContactController@answer')->name('admin.contact.answer');
});
Route::get('contact', 'ContactController@create')->name('contact.create');
Route::post('contact', 'ContactController@store')->name('contact.store');

// -----------------------------------  User Routes ------------------------------------

Route::prefix('admin/user')->middleware(['auth', 'auth.admin'])->group(function (){
    Route::get('/', 'Admin\UserController@index')->name('admin.user.index');
    Route::get('delete/{id}', 'Admin\UserController@destroy')->name('admin.user.destroy');
});

Route::prefix('admin/user')->middleware('auth')->group(function (){
    Route::get('logout', 'AuthController@logout')->name('admin.user.logout');
    Route::get('change-password', 'Admin\UserController@getChangePassword')->name('admin.user.change-password.edit');
    Route::post('change-password', 'Admin\UserController@changePassword')->name('admin.user.change-password.update');
    Route::get('edit', 'Admin\UserController@edit')->name('admin.user.edit');
    Route::post('edit', 'Admin\UserController@update')->name('admin.user.update');
});
Route::get('login', 'AuthController@login')->name('user.login');
Route::post('login', 'AuthController@authenticate')->name('user.auth');
Route::get('register', 'AuthController@create')->name('user.create');
Route::post('register', 'AuthController@store')->name('user.store');
Route::get('user/{slug}', 'AuthorController@show')->name('user.show');
