<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagessController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


Route::get('/', [PagessController::class, 'welcome'])->name('welcome');


Route::get('/postsview/{post}', [PagessController::class, 'postview'])->name('postview');




Route::middleware('auth')->group(function () {

    // for favourite
    // Route::get('/favourite', [PagessController::class, 'favourite'])->name('posts.favourite');

    Route::post('/posts/{post}/favourite', [PagessController::class, 'favourite'])->name('posts.favourite');
// web.php
Route::post('/posts/{post}/toggle-favourite', [PagessController::class, 'toggleFavourite'])->name('posts.favourite');

    Route::get('/dashboard', [PagessController::class, 'dashboard'])->name('dashboard');


    // Route::get('/category-index', [CategoryController::class, 'index'])->name('category.index');


    Route::resource('posts', PostController::class);
    Route::resource('categories', CategoryController::class);

});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
