<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\CabangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomponenController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PerawatanController;
use App\Http\Controllers\RiwayatPerubahanController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('home');
});
Route::prefix('barang')->group(function () {
    Route::get('/', [BarangController::class, 'index'])->name('barang.index');
    Route::get('/create', [BarangController::class, 'create'])->name('barang.create');
    Route::post('/barang', [BarangController::class, 'store'])->name('barang.store');
    Route::get('/{id}', [BarangController::class, 'show'])->name('barang.show');
    Route::get('/{id}/edit', [BarangController::class, 'edit'])->name('barang.edit');
    Route::put('/{id}', [BarangController::class, 'update'])->name('barang.update');
    Route::delete('/{id}', [BarangController::class, 'destroy'])->name('barang.delete');
});


// routes/web.php

Route::get('/barang/{barang}/perawatan/create', [PerawatanController::class, 'create'])->name('perawatan.create');
Route::post('/barang/{barang}/perawatan', [PerawatanController::class, 'store'])->name('perawatan.store');


Route::prefix('kategori')->group(function () {
    Route::get('/', [KategoriController::class, 'index'])->name('kategori.index');
    Route::get('/create', [KategoriController::class, 'create'])->name('kategori.create');
    Route::post('/kategori', [KategoriController::class, 'store'])->name('kategori.store');
    Route::get('/{id}/edit', [KategoriController::class, 'edit'])->name('kategori.edit');
    Route::put('/{id}', [KategoriController::class, 'update'])->name('kategori.update');
    Route::delete('/{id}', [KategoriController::class, 'destroy'])->name('kategori.delete');
});

Route::prefix('lokasi')->group(function () {
    Route::get('/', [LokasiController::class, 'index'])->name('lokasi.index');
    Route::get('/create', [LokasiController::class, 'create'])->name('lokasi.create');
    Route::post('/lokasi', [LokasiController::class, 'store'])->name('lokasi.store');
    Route::get('/{id}/edit', [LokasiController::class, 'edit'])->name('lokasi.edit');
    Route::put('/{id}', [LokasiController::class, 'update'])->name('lokasi.update');
});

Route::prefix('cabang')->group(function () {
    Route::get('/', [CabangController::class, 'index'])->name('cabang.index');
    Route::get('/create', [CabangController::class, 'create'])->name('cabang.create');
    Route::post('/lokasi', [CabangController::class, 'store'])->name('cabang.store');
    Route::get('/{id}/edit', [CabangController::class, 'edit'])->name('cabang.edit');
    Route::put('/{id}', [CabangController::class, 'update'])->name('cabang.update');
});



Route::resource('barang', BarangController::class);
Route::resource('komponen', KomponenController::class);
Route::resource('material', MaterialController::class);
Route::resource('perawatan', PerawatanController::class);
Route::resource('riwayat_perubahan', RiwayatPerubahanController::class);
