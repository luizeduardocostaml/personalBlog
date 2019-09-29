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



Route::view('/painelAdmin', 'admin.index')->name('painelAdmin');


Route::view('/painelContato', 'contato.index')->name('painelContato');