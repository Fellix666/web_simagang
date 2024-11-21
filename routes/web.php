<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakMagangController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminController::class, 'login'])->name('login.submit');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::resource('magang', AnakMagangController::class);
    Route::get('berkas/{id_magang}', [BerkasController::class, 'index'])->name('berkas.index');
    Route::post('berkas/{id_magang}', [BerkasController::class, 'store'])->name('berkas.store');
    Route::delete('berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');
});

// Redirect root to login if not authenticated
Route::get('/', [HomeController::class, 'index'])->name('home');

