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

Route::get('/', 'Blog\ViewsController@getBlog')->name('home');

// -----------------------------------  Blog Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/blogPanel', 'Blog\ViewsController@getPanel')->name('post.panel');
    Route::get('/registerPost', 'Blog\ViewsController@getStore')->name('post.getRegister');
    Route::post('/registerPost', 'Blog\BlogController@store')->name('post.register');
    Route::get('/editPostRequest/{id}', 'Blog\ViewsController@getEdit')->name('post.getEdit');
    Route::post('/editPostRequest', 'Blog\BlogController@edit')->name('post.edit');
    Route::get('/deletePost/{id}', 'Blog\BlogController@destroy')->name('post.delete');
});
Route::get('/post/{id}/{link}', 'Blog\ViewsController@getPost')->name('post.get');

// -----------------------------------  Admin Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/adminPanel', 'Admin\ViewsController@getPanel')->name('admin.panel');
    Route::get('/adminUserPanel', 'Admin\ViewsController@getUserPanel')->name('admin.userPanel');
});

// -----------------------------------  Contact Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/contactPanel', 'Contact\ViewsController@getPanel')->name('contact.panel');
    Route::get('/deleteMessage/{id}', 'ContactController@destroy')->name('contact.delete');
    Route::get('/showMessage/{id}', 'Contact\ViewsController@getMessage')->name('contact.message');
    Route::post('/answerMessage/{id}', 'ContactController@answerMessage')->name('contact.answer');
});
Route::get('/contact', 'Contact\ViewsController@getStore')->name('contact.getRegister');
Route::post('/contact', 'ContactController@store')->name('contact.register');

// -----------------------------------  Advertisement Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/advertisementPanel', 'Advertisement\ViewsController@getPanel')->name('ad.panel');
    Route::get('/registerAdvertisement', 'Advertisement\ViewsController@getStore')->name('ad.getRegister');
    Route::post('/registerAdvertisement', 'Advertisement\AdController@store')->name('ad.register');
    Route::get('/editAdvertisement/{id}', 'Advertisement\ViewsController@getEdit')->name('ad.getEdit');
    Route::post('/editAdvertisement', 'Advertisement\AdController@edit')->name('ad.edit');
    Route::get('/deleteAdvertisement/{id}', 'Advertisement\AdController@destroy')->name('ad.delete');
    Route::get('/upAdvertisement/{id}', 'Advertisement\AdController@upPosition')->name('ad.upPosition');
    Route::get('/downAdvertisement/{id}', 'Advertisement\AdController@downPosition')->name('ad.downPosition');
});

// -----------------------------------  User Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/logout', 'User\AuthController@logout')->name('user.logout');
    Route::get('/changePassword', 'User\ViewsController@getChangePassword')->name('user.getChangePassword');
    Route::post('/changePassword', 'User\AuthController@changePassword')->name('user.changePassword');
});
Route::get('/login', 'User\ViewsController@getLogin')->name('user.getLogin');
Route::post('/login', 'User\AuthController@authenticate')->name('user.login');
Route::get('/register', 'User\ViewsController@getRegister')->name('user.getRegister');
Route::post('/register', 'User\AuthController@register')->name('user.register');
