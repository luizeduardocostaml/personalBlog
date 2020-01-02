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

Route::view('/', 'admin.index');



Route::get('/painelBlog', 'BlogController@index')->name('painelBlog');
Route::view('/cadastrarPost', 'blog.cadastrarPost')->name('cadastrarPost');
Route::post('/cadastrarPost', 'BlogController@store')->name('registrarPost');
Route::get('/editPost/{id}', 'BlogController@getPost');
Route::post('/editarPost', 'BlogController@edit')->name('editarPost');
Route::get('/deletePost/{id}', 'BlogController@destroy');



Route::view('/painelAdmin', 'admin.index')->name('painelAdmin');


Route::get('/painelContato', 'ContatoController@index')->name('painelContato');
Route::post('/contato', 'ContatoController@store')->name('registrarMensagem');
Route::get('/deleteMessage/{id}', 'ContatoController@destroy');
Route::get('/showMessage/{id}', 'ContatoController@getMessage');


Route::view('/contato', 'contato.contato')->name('enviarMensagem');

