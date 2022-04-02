<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\AdminPostController;

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::delete('/admin/posts/{post}', [AdminPostController::class, 'destroy'])->name('admin.posts.destroy');

Route::get('/dashboard', [PostController::class, 'index'])->name('post.index');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('post.show');

Route::get('/admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->name('admin.posts.edit');
Route::post('/admin/posts/{post}', [AdminPostController::class, 'update'])->name('admin.posts.update');

Route::get('/admin/posts/create', [AdminPostController::class, 'create'])->name('admin.posts.create');
Route::post('/admin/posts', [AdminPostController::class, 'store'])->name('admin.posts.store');

Route::get('/admin/posts', [AdminPostController::class, 'index'])->name('admin.posts.index');
Route::get('/admin/posts/{post}', [AdminPostController::class, 'show'])->name('admin.posts.show');