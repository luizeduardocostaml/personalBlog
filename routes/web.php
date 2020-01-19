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



Route::get('/blogPanel', 'BlogController@blogPanel')->name('blogPanel')->middleware('auth');
Route::view('/registerPost', 'blog.register')->name('getRegisterPost')->middleware('auth');
Route::post('/registerPost', 'BlogController@store')->name('registerPost')->middleware('auth');
Route::get('/editPost/{id}', 'BlogController@getEditPost')->middleware('auth');
Route::post('/editPost', 'BlogController@edit')->name('editPost')->middleware('auth');
Route::get('/deletePost/{id}', 'BlogController@destroy')->middleware('auth');
Route::get('/post/{id}', 'BlogController@getPost');



Route::view('/adminPanel', 'admin.index')->name('adminPanel')->middleware('auth');
Route::get('/login', 'AuthController@loginView')->name('login');
Route::get('/register', 'AuthController@registerView');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::post('/register', 'AuthController@register')->name('register');
Route::get('/logout', 'AuthController@logout')->name('logout');


Route::get('/contactPanel', 'ContactController@index')->name('contactPanel')->middleware('auth');
Route::post('/contact', 'ContactController@store')->name('registerMessage');
Route::get('/deleteMessage/{id}', 'ContactController@destroy')->middleware('auth');
Route::get('/showMessage/{id}', 'ContactController@getMessage')->middleware('auth');
Route::view('/contact', 'contact.contact')->name('sendMessage');


Route::get('/advertisementPanel', 'AdController@adPanel')->name('adPanel')->middleware('auth');
Route::view('/registerAdvertisement', 'advertisement.register')->name('getRegisterAd')->middleware('auth');
Route::post('/registerAdvertisement', 'AdController@store')->name('registerAd')->middleware('auth');

