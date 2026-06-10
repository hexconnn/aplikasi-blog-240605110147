<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\PenulisController;
use App\Http\Controllers\KategoriArtikelController;

/*
|--------------------------------------------------------------------------
| Route Login
|--------------------------------------------------------------------------
*/

Route::get('/login', [LoginController::class, 'index'])
    ->name('login')
    ->middleware('guest');

Route::post('/login', [LoginController::class, 'proses'])
    ->name('login.proses')
    ->middleware('guest');

/*
|--------------------------------------------------------------------------
| Route Logout
|--------------------------------------------------------------------------
*/

Route::post('/logout', [LoginController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

/*
|--------------------------------------------------------------------------
| Route Yang Dilindungi Auth
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // Resource Artikel
    Route::resource('artikel', ArtikelController::class)
        ->except(['show']);

    // Resource Penulis
    Route::resource('penulis', PenulisController::class)
        ->except(['show']);

    // Resource Kategori
    Route::resource('kategori', KategoriArtikelController::class)
        ->except(['show']);
});

/*
|--------------------------------------------------------------------------
| Redirect Halaman Utama
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect()->route('login');
});