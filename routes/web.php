<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\GenreController;
use App\Http\Controllers\LoanController;

Route::get('/', function () {
    $loanCount = \App\Models\Loan::count();
    $bookCount = \App\Models\Book::count();
    $userCount = \App\Models\User::count();

    return view('welcome', compact('loanCount', 'bookCount', 'userCount'));
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

Route::controller(LoanController::class)->prefix('loans')->name('loans.')->group(function () {
    Route::get('/{book}/loan', [LoanController::class, 'view'])->name('loan');
    Route::post('/loan', [LoanController::class, 'store'])->name('store');
    Route::get('', [LoanController::class, 'index'])->name('index');
    Route::get('/edit/{loan}', [LoanController::class, 'edit'])->name('edit');
    Route::put('/update/{loan}', [LoanController::class, 'update'])->name('update');


});
Route::controller(GenreController::class)->prefix('genres')->name('genres.')->group(function () {
    Route::get('', [GenreController::class, 'view'])->name('view');
});
