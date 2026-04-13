<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WisataController;

Route::get('/', [WisataController::class, 'index'])->name('home');
Route::get('/destinasi/{id}', [WisataController::class, 'detail'])->name('detail'); 