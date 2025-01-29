<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenaltyController;
use App\Http\Controllers\TaxPaymentController;
use App\Http\Controllers\ReportsController;

Route::middleware('auth', 'verified')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/users', [UserController::class, 'index'])->name('users.index');
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
    Route::patch('/users/{user}', [UserController::class, 'update'])->name('users.update');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');

    Route::resource('properties', PropertyController::class);
    Route::resource('penalties', PenaltyController::class);
    Route::get('reports', [ReportsController::class, 'index'])->name('reports.index');
    Route::get('/tax-payments', [TaxPaymentController::class, 'index'])->name('taxpayment.index');
    Route::post('/tax-payments/store', [TaxPaymentController::class, 'store'])->name('taxpayment.store');
    Route::post('/tax-payments/pay-taxes', [TaxPaymentController::class, 'payTaxes'])->name('tax-payments.pay-taxes');
    Route::get('/tax-payments/{id}', [TaxPaymentController::class, 'getReceipt'])->name('tax-payments.get-receipt');

});

require __DIR__ . '/auth.php';
