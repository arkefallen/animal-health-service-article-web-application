<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ApiArticleController;
use App\Http\Controllers\api\v1\ApiFeedbackController;

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

Route::get('articles', [ApiArticleController::class, 'index']);
Route::get('articles/{id}', [ApiArticleController::class, 'show']);

Route::get('feedbacks', [ApiFeedbackController::class, 'index']);
Route::post('feedbacks', [ApiFeedbackController::class, 'store']);