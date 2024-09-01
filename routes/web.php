<?php

use App\Http\Controllers\ArticleCategoryController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReviewController;
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

Route::middleware(['guest'])->group(function () {
    Route::get('', [AuthenticatedSessionController::class, 'create']);
    Route::get('login', [AuthenticatedSessionController::class, 'create']);
    Route::post('login', [AuthenticatedSessionController::class, 'store'])
    ->name('login.store');
});

Route::middleware('auth')->group(function () {
    //Dashboard
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
    Route::get('category', [ArticleCategoryController::class, 'index'])->name('category');
    Route::put('category/{id}', [ArticleCategoryController::class, 'update'])->name('category.update');
    Route::delete('category/{id}', [ArticleCategoryController::class, 'destroy'])->name('category.destroy');
    Route::post('category', [ArticleCategoryController::class, 'store'])->name('category.store');

    // Reviews
    Route::get('reviews', [ReviewController::class, 'index'])->name('review');
    Route::get('reviews/{id}', [ReviewController::class, 'show'])->name('review.detail');
    Route::get('reviews/edit/{id}', [ReviewController::class, 'edit'])->name('review.edit');
    Route::put('reviews/edit/{id}', [ReviewController::class, 'update'])->name('review.update');
    Route::delete('reviews/{id}', [ReviewController::class, 'destroy'])->name('review.destroy');

    // Logout
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');
});

require __DIR__.'/auth.php';
