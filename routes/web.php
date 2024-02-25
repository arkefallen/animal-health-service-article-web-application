<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ArticleController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'App\Http\Controllers\ArticleController@showAllArticle')->name('index');

Route::get('/create','App\Http\Controllers\ArticleController@addNewArticle')->name('create');

Route::post('/','App\Http\Controllers\ArticleController@store')->name('article.create');

Route::get('/detail/{id}','App\Http\Controllers\ArticleController@showDetailArticle')->name('article.detail');
