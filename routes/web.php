<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BukuController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;

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

Route::get('/hello', function () {
        return "Halo, ini halaman percobaan route!";
    });

Route::get('/jobs', [JobController::class, 'index']);

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

    Route::get('/admin', function () {
        return "Halaman Admin";
    })->middleware(['auth', 'isAdmin']);
});

Route::get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->middleware(['auth']);

Route::get('/admin/jobs', function () {
    return view('jobs');
})->middleware(['auth', 'isAdmin']);

// Auth routes (login, register, forgot password, dsb)
require __DIR__.'/auth.php';