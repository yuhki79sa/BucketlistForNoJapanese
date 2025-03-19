<?php

namespace App\Http\Controllers;

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\ChoiceController;
use Illuminate\Support\Facades\Route;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Choice;
use App\Models\ChoiceCategory;

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



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/posts', [PostController::class, 'index'])->name('index')->middleware('auth');

Route::get('/posts/{post}/show', [PostController::class, 'show']);

Route::get('/bucketlist', [PostController::class, 'bucketlist'])->name('bucketlist');

Route::get('/popular', [PostController::class, 'popular'])->name('popular');

Route::post('/todo', [PostController::class, 'store']);

Route::patch('/posts/{post}/isDone', [PostController::class, 'isDone'])->name('isDone');

Route::get('/achievement', [PostController::class, 'achieve'])->name('achievement');

Route::post('/post/like', [PostLikeController::class, 'likePost']);

Route::get('/posts/{post}/impression', [CommentController::class, 'impression']);

Route::post('/achievement/{post}/comment', [CommentController::class, 'store']);

Route::get('/achievements/{post}/show', [CommentController::class, 'show']);

Route::get('/posts/{post}/choice', [ChoiceController::class, 'choice'])->name('choice');

Route::post('/posts/{post}/choice/store', [ChoiceController::class, 'store']);

Route::get('/posts/popular/serch', [PostController::class, 'popular'])->name('posts.popular');

Route::get('/posts/index/serch', [PostController::class, 'index'])->name('posts.index');

Route::delete('/posts/{post}/', [PostController::class, 'destroy']);

require __DIR__.'/auth.php';
