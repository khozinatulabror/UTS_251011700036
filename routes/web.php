<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReviewController;

// Beranda
Route::get('/', [ReviewController::class, 'home'])
    ->name('home');

// Daftar seluruh resensi buku
Route::get('/reviews', [ReviewController::class, 'index'])
    ->name('reviews.index');

// Detail resensi buku
Route::get('/reviews/{id}', [ReviewController::class, 'show'])
    ->name('reviews.show');
