<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PagessController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
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
