<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Article;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('articles', 'ArticleController@index');

Route::get('articles/{id}', 'ArticleController@show');

Route::post('articles', 'ArticleController@store');

Route::put('articles/{id}', 'ArticleController@update');

Route::delete('articles/{id}', 'ArticleController@delete');




