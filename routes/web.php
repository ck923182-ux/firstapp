<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\AuthorController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\QueueTestController;


Route::get('/', function () {
    return view('welcome');
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

// Route::middleware(['auth'])->group(function () {
//     Route::resource('blogs', \App\Http\Controllers\BlogController::class);
// });
Route::middleware(['auth', 'can:manage-blogs'])->group(function () {
    Route::resource('blogs', BlogController::class);
});


Route::middleware(['auth'])->group(function () {
    Route::resource('categories', \App\Http\Controllers\CategoryController::class);
});
Route::middleware(['auth'])->group(function () {
    Route::resource('author', \App\Http\Controllers\AuthorController::class);
});
Route::get('/queue-test', [QueueTestController::class, 'test']);
