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

Route::get('/', [ArticleController::class, 'index'])->name('index');
Route::get('/create', [ArticleController::class, 'create'])->name('create');
Route::post('/', [ArticleController::class, 'store'])->name('article.create');
Route::get('/detail/{id}', [ArticleController::class, 'show'])->name('article.detail');
Route::delete('/{id}', [ArticleController::class, 'delete'])->name('article.delete');
Route::get('/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
Route::put('/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
