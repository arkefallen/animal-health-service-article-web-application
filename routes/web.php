<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')->group(function () {
    // Article
    Route::get('/', [ArticleController::class, 'index'])->name('index');
    Route::get('create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('create/{id}', [ArticleController::class, 'store'])->name('article.store');
    Route::delete('{id}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('detail/{id}',[ArticleController::class, 'show'])->name('article.detail');

    // Article Category
    Route::get('category', [ArticleCategoryController::class, 'create'])->name('category.create');
    Route::delete('category/{id}', [ArticleCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('category', [ArticleCategoryController::class, 'store'])->name('category.store');
});

require __DIR__.'/auth.php';
