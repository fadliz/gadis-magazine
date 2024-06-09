<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ProfileController;

Route::get('/', [HomeController::class, 'index'])->name('dashboard');

/* Route::get('/list', function () {
    return view('list-article');
})->name('list'); */

Route::get('/article', function () {
    return view('article');
})->name('article');

Route::resource('articles', ArticleController::class);
Route::get('/articles/{article}/comments', [ArticleController::class, 'fetchComments']);
Route::post('/articles/{article}/comments', [CommentController::class, 'store'])->name('comments.store');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/profile', [ProfileController::class, 'process'])->name('profile.process');
});

require __DIR__.'/auth.php';
