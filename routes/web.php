<?php

use App\Http\Controllers\AjaxController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return redirect()->route('post');
});

Route::get('/dashboard', function () {
    $user = Auth::user()->admin;
    if ($user == 1) {
        return view('admin.index');
    }
    return redirect()->route('post');
})->middleware(['auth'])->name('dashboard');


// admin privileges //
Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/admin', function () {
        return view('admin.index');
    })->name('admin');

    Route::resource('users', UserController::class);
    Route::resource('posts', PostController::class);
    Route::resource('category', \App\Http\Controllers\CategoryController::class);
});


// user privileges //
Route::middleware(['auth'])->group(function () {
    Route::get('/ajax', AjaxController::class)->name('ajax');

    Route::get('post', [HomeController::class, 'index'])->name('post');
    Route::post('post.store', [HomeController::class, 'store'])->name('post.store');
    Route::get('post.show/{post}', [HomeController::class, 'show'])->name('post.show');
    Route::post('post.search', [HomeController::class, 'search'])->name('post.search');

    Route::resource('comment', CommentController::class);
    Route::post('like.store', [LikeController::class, 'store'])->name('like.store');

    Route::post('comment',[CommentController::class, 'store'])->name('comment');
});

require __DIR__ . '/auth.php';
