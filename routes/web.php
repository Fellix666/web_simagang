<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AnakMagangController;
use App\Http\Controllers\BerkasController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DivisiController;
use App\Http\Controllers\InstitusiController;
use Illuminate\Support\Facades\Route;

// Authentication Routes
Route::get('login', [AdminController::class, 'showLoginForm'])->name('login');
Route::post('login', [AdminController::class, 'login'])->name('login.submit');
Route::post('logout', [AdminController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/dashboard', [DashboardAdminController::class, 'index'])->name('dashboard.index');
    Route::resource('magang', AnakMagangController::class);
    Route::get('berkas/', [BerkasController::class, 'index'])->name('berkas.index');
    Route::post('berkas/', [BerkasController::class, 'store'])->name('berkas.store');
    Route::delete('berkas/{id}', [BerkasController::class, 'destroy'])->name('berkas.destroy');
    Route::resource('institusi', InstitusiController::class);
    Route::resource('divisi', DivisiController::class);
    Route::get('berkas/create', [BerkasController::class, 'create'])->name('berkas.create');
    Route::get('berkas/{id}/edit', [BerkasController::class, 'edit'])->name('berkas.edit');
    Route::post('berkas/{id}', [BerkasController::class, 'update'])->name('berkas.update');

});

// Redirect root to login if not authenticated
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('peserta-magang', [AnakMagangController::class, 'readonly'])->name('readonly');
Route::resource('magang', AnakMagangController::class)->except(['show']);
Route::resource('magang', AnakMagangController::class);