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



Route::get('/painelBlog', 'BlogController@blogPanel')->name('painelBlog')->middleware('auth');
Route::view('/cadastrarPost', 'blog.cadastrarPost')->name('cadastrarPost')->middleware('auth');
Route::post('/cadastrarPost', 'BlogController@store')->name('registrarPost')->middleware('auth');
Route::get('/editPost/{id}', 'BlogController@getEditPost')->middleware('auth');
Route::post('/editarPost', 'BlogController@edit')->name('editarPost')->middleware('auth');
Route::get('/deletePost/{id}', 'BlogController@destroy')->middleware('auth');
Route::get('/post/{id}', 'BlogController@getPost');



Route::view('/painelAdmin', 'admin.index')->name('painelAdmin')->middleware('auth');
Route::view('/login', 'admin.login')->name('login');
Route::get('/register', 'AuthController@registerView');
Route::post('/login', 'AuthController@authenticate')->name('authenticate');
Route::post('/register', 'AuthController@register')->name('register');


Route::get('/painelContato', 'ContatoController@index')->name('painelContato')->middleware('auth');
Route::post('/contato', 'ContatoController@store')->name('registrarMensagem');
Route::get('/deleteMessage/{id}', 'ContatoController@destroy')->middleware('auth');
Route::get('/showMessage/{id}', 'ContatoController@getMessage')->middleware('auth');
Route::view('/contato', 'contato.contato')->name('enviarMensagem');

