<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProsesController;
use App\Http\Controllers\SawController;
use App\Http\Controllers\WpController;
use Illuminate\Support\Facades\Route;


Route::middleware('auth')->group(function () {
    Route::get('/admin', [DashboardController::class, 'index'])->name('dashboard.index');

    // Route Produk
    Route::get('produk', [ProdukController::class, 'index'])->name('produk.index');
    Route::get('produk/creat', [ProdukController::class, 'creat'])->name('produk.creat');
    Route::post('produk', [ProdukController::class, 'tambah'])->name('produk.tambah');
    Route::put('produk/{id}', [ProdukController::class, 'update'])->name('produk.update');
    Route::delete('produk/{id}', [ProdukController::class, 'hapus'])->name('produk.hapus');

    // Route Alternatif
    Route::get('alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
    Route::post('alternatif', [AlternatifController::class, 'tambah'])->name('alternatif.tambah');
    Route::put('alternatif/{alternatif}', [AlternatifController::class, 'update'])->name('alternatif.update');
    Route::delete('alternatif{alternatif}', [AlternatifController::class, 'hapus'])->name('alternatif.hapus');

    // Route Kriteria
    Route::get('kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::post('kriteria', [KriteriaController::class, 'tambah'])->name('kriteria.tambah');
    Route::put('kriteria/{kriteria}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('kriteria/{kriteria}', [KriteriaController::class, 'hapus'])->name('kriteria.hapus');

     // Route Proses
    Route::get('proses', [ProsesController::class, 'index'])->name('proses.index');

    // Route Detail Proses WP
    Route::get('/bobot_produk_wp', [WpController::class, 'index'])->name('bobot_produk_wp.index');
    // Route::get('/bobot_produk_wp', [WpController::class, 'simpan'])->name('bobot_produk_wp.index');

    // Route Detail Proses SAW
    Route::get('/bobot_produk_saw', [SawController::class, 'index'])->name('bobot_produk_saw.index');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
