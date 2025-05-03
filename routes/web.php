<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenresController;

Route::get('/', function () {
    return view('welcome');
});


Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
    Route::get('', [UserController::class, 'index'])->name('index');
    Route::get('/view', [UserController::class, 'view'])->name('view');
    Route::get('/create', [UserController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [UserController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [UserController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [UserController::class, 'destroy'])->name('delete');
    Route::post('', [UserController::class, 'store'])->name('store');
});

Route::controller(BookController::class)->prefix('books')->name('books.')->group(function () {
    Route::get('', [BookController::class, 'index'])->name('index');
    Route::get('/view', [BookController::class, 'view'])->name('view');
    Route::get('/create', [BookController::class, 'create'])->name('create');
    Route::get('/edit/{id}', [BookController::class, 'edit'])->name('edit');
    Route::put('/update/{id}', [BookController::class, 'update'])->name('update');
    Route::delete('/delete/{id}', [BookController::class, 'destroy'])->name('delete');
    Route::post('', [BookController::class, 'store'])->name('store');
});


Route::controller(GenresController::class)->prefix('genres')->name('genres.')->group(function () {
    Route::get('', [GenresController::class, 'view'])->name('view');
});
