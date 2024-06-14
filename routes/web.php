<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
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
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Article
    Route::get('article', [ArticleController::class, 'index'])->name('article');
    Route::get('article/create', [ArticleController::class, 'create'])->name('article.create');
    Route::post('article/create', [ArticleController::class, 'store'])->name('article.store');
    Route::delete('article/{id}', [ArticleController::class, 'delete'])->name('article.delete');
    Route::get('article/edit/{id}', [ArticleController::class, 'edit'])->name('article.edit');
    Route::put('article/edit/{id}', [ArticleController::class, 'update'])->name('article.update');
    Route::get('article/detail/{id}',[ArticleController::class, 'show'])->name('article.detail');

    // Article Category
    Route::get('category', [ArticleCategoryController::class, 'create'])->name('category.create');
    Route::delete('category/{id}', [ArticleCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('category', [ArticleCategoryController::class, 'store'])->name('category.store');
});

require __DIR__.'/auth.php';
