<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [ UserController::class, 'index'])->name('users.index');
    Route::post('/users', [ UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}', [ UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [ UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('properties', PropertyController::class);
});

require __DIR__.'/auth.php';
