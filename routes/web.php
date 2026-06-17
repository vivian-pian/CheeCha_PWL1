<?php

use Illuminate\Http\Request;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\SaleController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/dashboard/add', [DashboardController::class, 'store'])->name('inventory.store');
    Route::put('/dashboard/{id}', [DashboardController::class, 'update'])->name('inventory.update');
    Route::delete('/dashboard/{id}', [DashboardController::class, 'destroy'])->name('inventory.destroy');
    Route::get('/dashboard/{id}/edit', [DashboardController::class, 'edit'])->name('inventory.edit');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('products', ProductController::class);
    Route::resource('sales', SaleController::class);
    Route::resource('user', UserController::class);
});

require __DIR__ . '/auth.php';