<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/', [UserController::class , 'index'])->name('user.index');
Route::get('/create', [UserController::class , 'create'])->name('user.create');
Route::post('/store', [UserController::class , 'store'])->name('user.store');
Route::get('/login', [UserController::class , 'login'])->name('user.login');
Route::post('/logincheck', [UserController::class , 'loginCheck'])->name('user.logincheck');
Route::get('/logout', [UserController::class, 'logout'])->name('user.logout');
Route::get('/{id}/show', [UserController::class , 'show'])->name('user.show');
Route::get('/{id}/edit', [UserController::class , 'edit'])->name('user.edit');
Route::post('/{id}/update', [UserController::class , 'update'])->name('user.update');
Route::get('/{id}/destroy', [UserController::class , 'destroy'])->name('user.delete');

Route::get('/posts', [PostController::class , 'index'])->name('posts.index');
Route::get('/posts/create', [PostController::class , 'create'])->name('posts.create');
Route::post('/posts/store', [PostController::class , 'store'])->name('posts.store');
Route::get('/posts/{id}/show', [PostController::class , 'show'])->name('posts.show');
Route::get('/posts/{id}/edit', [PostController::class , 'edit'])->name('posts.edit');
Route::post('/posts/{id}/update', [PostController::class , 'update'])->name('posts.update');
Route::get('/posts/{id}/destroy', [PostController::class , 'destroy'])->name('posts.delete');

Route::post('/posts/{postId}/comments', [CommentController::class, 'store'])->name('comments.store');
Route::get('/comments/{id}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::post('/comments/{id}/update', [CommentController::class, 'update'])->name('comments.update');
Route::get('/comments/{id}/delete', [CommentController::class, 'destroy'])->name('comments.delete');

