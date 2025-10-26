<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Di sini tempat kamu mendaftarkan route web aplikasi.
| File ini otomatis dimuat oleh RouteServiceProvider.
|
*/

// Halaman utama (tanpa login)
Route::get('/', function () {
    return view('welcome');
});

// Semua route di bawah ini harus login dulu
Route::middleware(['auth', 'verified'])->group(function () {

    // Dashboard
    Route::get('/dashboard', [BukuController::class, 'index'])->name('dashboard');

    // Resource Buku
    Route::resource('buku', BukuController::class);

    // Profile (default dari Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Auth routes (login, register, forgot password, dsb)
require __DIR__.'/auth.php';