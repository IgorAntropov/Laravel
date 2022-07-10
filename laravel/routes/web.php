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

Route::get('/news', 'MainController@news')->name('news');
Route::post('/news/add', 'MainController@news_add');
Route::get('/news/open/{slug}{id}', 'MainController@news_id')->name('news.open');
