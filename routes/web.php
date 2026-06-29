<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ================= RUTE PENGUNJUNG / UMUM =================
// Halaman utama
Route::get('/', [WisataController::class, 'index'])->name('home');

// Halaman detail destinasi
Route::get('/destinasi/{id}', [WisataController::class, 'detail'])->name('detail');

// Kirim komentar (wajib login)
Route::post('/kirim-komentar', [WisataController::class, 'storeKomentar'])
    ->middleware('auth')
    ->name('komentar.store');

// ================= RUTE AUTHENTIKASI =================
// Login
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// Register
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// Logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// ================= RUTE DASHBOARD ADMIN =================
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    
    // ===== RUTE CRUD WISATA =====
    Route::get('/wisata', [AdminController::class, 'wisataIndex'])->name('wisata.index');
    Route::get('/wisata/create', [AdminController::class, 'wisataCreate'])->name('wisata.create');
    Route::post('/wisata', [AdminController::class, 'wisataStore'])->name('wisata.store');
    Route::get('/wisata/{id}/edit', [AdminController::class, 'wisataEdit'])->name('wisata.edit');
    Route::put('/wisata/{id}', [AdminController::class, 'wisataUpdate'])->name('wisata.update');
    Route::delete('/wisata/{id}', [AdminController::class, 'wisataDestroy'])->name('wisata.destroy');
});