<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ArticleControllerAPI;
use App\Http\Controllers\API\CommentControllerAPI;
use App\Http\Controllers\API\ProfileControllerAPI;
use App\Http\Controllers\API\NewPasswordController;
use App\Http\Controllers\API\RegisteredUserController;
use App\Http\Controllers\API\PasswordResetLinkController;
use App\Http\Controllers\API\AuthenticatedSessionController;

Route::get('user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);
Route::post('reset-password', [NewPasswordController::class, 'store']);


Route::middleware('auth:sanctum')->group(function () {
    Route::post('logout', [AuthController::class, 'logout']);
});

Route::get('articles', [ArticleControllerAPI::class, 'index']);
Route::get('articles/latest', [ArticleControllerAPI::class, 'fetchLatestArticles']);
Route::get('articles/{article}', [ArticleControllerAPI::class, 'show']);
Route::get('articles/{article}/comments', [ArticleControllerAPI::class, 'fetchFourComment']);
Route::get('articles/{article}/comments/rest', [ArticleControllerAPI::class, 'fetchComments']);
Route::middleware('auth:sanctum')->group(function () {
    Route::post('articles', [ArticleControllerAPI::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('articles/{article}/comments', [CommentControllerAPI::class, 'store']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::get('profile', [ProfileControllerAPI::class, 'show']);
    Route::put('profile', [ProfileControllerAPI::class, 'update']);
    Route::delete('profile', [ProfileControllerAPI::class, 'destroy']);
});

Route::middleware('auth:sanctum')->group(function () {
    Route::post('profile/process', [ProfileControllerAPI::class, 'process']);
});
