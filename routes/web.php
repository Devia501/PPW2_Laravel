<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AboutController;
use App\Http\Controllers\BukuController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', [AboutController::class, 'index']);

// Buku (CRUD)
Route::get('/buku', [BukuController::class, 'index'])->name('buku.index');

// Tambah Buku
Route::get('/buku/create', [BukuController::class, 'create'])->name('buku.create');
Route::post('/buku/store', [BukuController::class, 'store'])->name('buku.store');

// Edit Buku
Route::get('/buku/{id}/edit', [BukuController::class, 'edit'])->name('buku.edit');
Route::put('/buku/{id}', [BukuController::class, 'update'])->name('buku.update');


// Delete
Route::delete('/buku/{id}', [BukuController::class, 'destroy'])->name('buku.destroy');
