<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/welcome', function () {
    return view('welcome');
})->middleware(\App\Http\Middleware\SampleMiddleware::class); // 個別ミドルウェア

// Sample
Route::get('/sample', [\App\Http\Controllers\Sample\IndexController::class, 'show']);
Route::get('/sample/{id}', [\App\Http\Controllers\Sample\IndexController::class, 'showId']);

// Tweet
Route::get('/tweet', \App\Http\Controllers\Tweet\IndexController::class)
->name('tweet.index');
Route::middleware('auth')->group(function () {
    Route::post('/tweet/create', \App\Http\Controllers\Tweet\CreateController::class)
    ->name('tweet.create');
    Route::get('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\IndexController::class)
    ->name('tweet.update.index');
    Route::put('/tweet/update/{tweetId}', \App\Http\Controllers\Tweet\Update\PutController::class)
    ->name('tweet.update.put');
    Route::delete('/tweet/delete/{tweetId}', \App\Http\Controllers\Tweet\DeleteController::class)
    ->name('tweet.delete');
});

// User
Route::middleware('auth')->group(function () {
    Route::get('/tweet/admin/user/update/{userId}', \App\Http\Controllers\Admin\User\IndexController::class)
    ->name('admin.user.update.index');
    Route::put('/tweet/admin/user/update/{userId}', \App\Http\Controllers\Admin\User\PutController::class)
    ->name('admin.user.update.put');
    Route::delete('/tweet/admin/user/delete/{userId}', \App\Http\Controllers\Admin\User\DeleteController::class)
    ->name('admin.user.delete');
});

Route::group(['middleware' => ['auth', 'can:admin']], function () {
    Route::get('/tweet/admin', \App\Http\Controllers\Admin\AdminController::class)
    ->name('admin.tweet.index');
    Route::get('/tweet/admin/tweet/update/{tweetId}', \App\Http\Controllers\Admin\Tweet\Update\IndexController::class)
    ->name('admin.tweet.update.index');
    Route::put('/tweet/admin/tweet/update/{tweetId}', \App\Http\Controllers\Admin\Tweet\Update\PutController::class)
    ->name('admin.tweet.update.put');
    Route::delete('/tweet/admin/tweet/update/{tweetId}', \App\Http\Controllers\Admin\Tweet\DeleteController::class)
    ->name('admin.tweet.delete');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
