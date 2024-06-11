<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
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


Route::middleware('guest:api')->group(function () {
    Route::post('register', [RegisteredUserController::class, 'store']);
    Route::post('login', [AuthenticatedSessionController::class, 'store']);
    Route::post('forgot-password', [PasswordResetLinkController::class, 'store']);
    Route::post('reset-password', [NewPasswordController::class, 'store']);
});

Route::middleware('auth:api')->group(function () {
    Route::post('logout', [AuthenticatedSessionController::class, 'destroy']);
});

Route::get('articles', [ArticleControllerAPI::class, 'index']);
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
