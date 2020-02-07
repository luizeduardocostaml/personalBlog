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

Route::get('/', 'BlogController@index')->name('home');

// -----------------------------------  Blog Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/blogPanel', 'BlogController@blogPanel')->name('post.panel');
    Route::view('/registerPost', 'blog.register')->name('post.getRegister');
    Route::post('/registerPost', 'BlogController@store')->name('post.register');
    Route::get('/editPostRequest/{id}', 'BlogController@getEditPost')->name('post.getEdit');
    Route::post('/editPostRequest', 'BlogController@edit')->name('post.edit');
    Route::get('/deletePost/{id}', 'BlogController@destroy')->name('post.delete');
});
Route::get('/post/{id}/{link}', 'BlogController@getPost')->name('post.get');

// -----------------------------------  Admin Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::view('/adminPanel', 'admin.index')->name('admin.panel');
    Route::get('/logout', 'AuthController@logout')->name('admin.logout');
    Route::view('/changePassword', 'admin.changePassword')->name('admin.getChangePassword');
    Route::post('/changePassword', 'AuthController@changePassword')->name('admin.changePassword');
});
Route::get('/login', 'AuthController@loginView')->name('admin.getLogin');
Route::post('/login', 'AuthController@authenticate')->name('admin.login');
Route::get('/register', 'AuthController@registerView')->name('admin.getRegister');
Route::post('/register', 'AuthController@register')->name('admin.register');

// -----------------------------------  Contact Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/contactPanel', 'ContactController@index')->name('contact.panel');
    Route::get('/deleteMessage/{id}', 'ContactController@destroy')->name('contact.delete');
    Route::get('/showMessage/{id}', 'ContactController@getMessage')->name('contact.message');
});
Route::view('/contact', 'contact.contact')->name('contact.getRegister');
Route::post('/contact', 'ContactController@store')->name('contact.register');

// -----------------------------------  Advertisement Routes ------------------------------------

Route::middleware('auth')->group(function (){
    Route::get('/advertisementPanel', 'AdController@adPanel')->name('ad.panel');
    Route::view('/registerAdvertisement', 'advertisement.register')->name('ad.getRegister');
    Route::post('/registerAdvertisement', 'AdController@store')->name('ad.register');
    Route::get('/editAdvertisement/{id}', 'AdController@getEditAdvertisement')->name('ad.getEdit');
    Route::post('/editAdvertisement', 'AdController@edit')->name('ad.edit');
    Route::get('/deleteAdvertisement/{id}', 'AdController@destroy')->name('ad.delete');
    Route::get('/upAdvertisement/{id}', 'AdController@upPosition')->name('ad.upPosition');
    Route::get('/downAdvertisement/{id}', 'AdController@downPosition')->name('ad.downPosition');
});


