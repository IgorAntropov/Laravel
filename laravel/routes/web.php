<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'MainController@home');
Route::get('/posts', 'MainController@posts')->name('posts');
Route::post('/posts/add', 'MainController@post_add');
Route::get('/posts/open/{slug}{id}', 'MainController@post_open')->name('post.open');
