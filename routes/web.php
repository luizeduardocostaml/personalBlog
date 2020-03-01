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

Route::get('/', 'News\ViewsController@getNews')->name('home');
Route::view('/forbidden', 'layouts.forbidden')->name('forbiddenRoute');

// -----------------------------------  Blog Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/blogPanel', 'Blog\ViewsController@getPanel')->name('post.panel');
    Route::get('/registerPost', 'Blog\ViewsController@getStore')->name('post.getRegister');
    Route::post('/registerPost', 'Blog\BlogController@store')->name('post.register');
    Route::get('/editPostRequest/{id}', 'Blog\ViewsController@getEdit')->name('post.getEdit');
    Route::post('/editPostRequest', 'Blog\BlogController@edit')->name('post.edit');
    Route::get('/deletePost/{id}', 'Blog\BlogController@destroy')->name('post.delete');
});
Route::get('/blog', 'Blog\ViewsController@getBlog')->name('blog');
Route::get('/post/{id}/{link}', 'Blog\ViewsController@getPost')->name('post.get');

// -----------------------------------  News Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/newsPanel', 'News\ViewsController@getPanel')->name('news.panel');
    Route::get('/registerNews', 'News\ViewsController@getStore')->name('news.getRegister');
    Route::post('/registerNews', 'News\NewsController@store')->name('news.register');
    Route::get('/editNewsRequest/{id}', 'News\ViewsController@getEdit')->name('news.getEdit');
    Route::post('/editNewsRequest', 'News\NewsController@edit')->name('news.edit');
    Route::get('/deleteNews/{id}', 'News\NewsController@destroy')->name('news.delete');
});
Route::get('/news/{id}/{link}', 'News\ViewsController@getNotice')->name('news.get');
Route::get('/news', 'News\ViewsController@getNews')->name('news');

// -----------------------------------  Admin Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/adminPanel', 'Admin\ViewsController@getPanel')->name('admin.panel');
    Route::get('/adminUserPanel', 'Admin\ViewsController@getUserPanel')->name('admin.userPanel');
});

// -----------------------------------  Contact Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/contactPanel', 'Contact\ViewsController@getPanel')->name('contact.panel');
    Route::get('/deleteMessage/{id}', 'Contact\ContactController@destroy')->name('contact.delete');
    Route::get('/showMessage/{id}', 'Contact\ViewsController@getMessage')->name('contact.message');
    Route::post('/answerMessage/{id}', 'Contact\ContactController@answerMessage')->name('contact.answer');
});
Route::get('/contact', 'Contact\ViewsController@getStore')->name('contact.getRegister');
Route::post('/contact', 'Contact\ContactController@store')->name('contact.register');

// -----------------------------------  User Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/logout', 'User\AuthController@logout')->name('user.logout');
    Route::get('/changePassword', 'User\ViewsController@getChangePassword')->name('user.getChangePassword');
    Route::post('/changePassword', 'User\AuthController@changePassword')->name('user.changePassword');
    Route::get('/deleteUser/{id}', 'User\AuthController@destroy')->name('user.destroy');
});
Route::get('/login', 'User\ViewsController@getLogin')->name('user.getLogin');
Route::post('/login', 'User\AuthController@authenticate')->name('user.login');
Route::get('/register', 'User\ViewsController@getRegister')->name('user.getRegister');
Route::post('/register', 'User\AuthController@register')->name('user.register');
