<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
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
