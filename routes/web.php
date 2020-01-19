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
    Route::get('/blogPanel', 'BlogController@blogPanel')->name('blogPanel');
    Route::view('/registerPost', 'blog.register')->name('getRegisterPost');
    Route::post('/registerPost', 'BlogController@store')->name('registerPost');
    Route::get('/editPost/{id}', 'BlogController@getEditPost');
    Route::post('/editPost', 'BlogController@edit')->name('editPost');
    Route::get('/deletePost/{id}', 'BlogController@destroy');
});
Route::get('/post/{id}', 'BlogController@getPost');

// -----------------------------------  Admin Routes ------------------------------------
Route::middleware('auth')->group(function (){
    Route::view('/adminPanel', 'admin.index')->name('adminPanel');
    Route::get('/logout', 'AuthController@logout')->name('logout');
});
Route::get('/login', 'AuthController@loginView')->name('login');
Route::get('/register', 'AuthController@registerView');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::post('/register', 'AuthController@register')->name('register');

// -----------------------------------  Contact Routes ------------------------------------
Route::middleware('auth')->group(function (){
    Route::get('/contactPanel', 'ContactController@index')->name('contactPanel');
    Route::get('/deleteMessage/{id}', 'ContactController@destroy');
    Route::get('/showMessage/{id}', 'ContactController@getMessage');
});
Route::post('/contact', 'ContactController@store')->name('registerMessage');
Route::view('/contact', 'contact.contact')->name('sendMessage');

// -----------------------------------  Advertisement Routes ------------------------------------
Route::middleware('auth')->group(function (){
    Route::get('/advertisementPanel', 'AdController@adPanel')->name('adPanel');
    Route::view('/registerAdvertisement', 'advertisement.register')->name('getRegisterAd');
    Route::post('/registerAdvertisement', 'AdController@store')->name('registerAd');
    Route::get('/editAdvertisement/{id}', 'AdController@getEditAdvertisement');
    Route::post('/editAdvertisement', 'AdController@edit')->name('editAd');
    Route::get('/deleteAdvertisement/{id}', 'AdController@destroy');
});


