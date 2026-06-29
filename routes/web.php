<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\AuthController;

// Halaman utama
Route::get('/', [WisataController::class, 'index'])->name('home');
Route::get('/destinasi/{id}', [WisataController::class, 'detail'])->name('detail');

// Rute Tambahan: Menyimpan komentar baru dari Halaman Utama (Wajib Login)
Route::post('/kirim-komentar', [WisataController::class, 'storeKomentar'])->middleware('auth')->name('komentar.store');

// Auth Routes (Login, Register, Logout)
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= RUTE DASHBOARD ADMIN =================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\AdminController::class, 'dashboard'])->name('dashboard');
});