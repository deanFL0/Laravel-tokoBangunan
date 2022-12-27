<?php

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

Route::get('/karyawan', [App\Http\Controllers\KaryawanController::class, 'index'])->name('karyawan');
Route::get('/karyawan/tambah', [App\Http\Controllers\KaryawanController::class, 'create'])->name('karyawan.create');
Route::post('/karyawan/store', [App\Http\Controllers\KaryawanController::class, 'store'])->name('karyawan.store');
Route::get('/karyawan/{id}/edit', [App\Http\Controllers\KaryawanController::class, 'edit'])->name('karyawan.edit');
Route::delete('/karyawan/{id}/hapus', [App\Http\Controllers\KaryawanController::class, 'destroy'])->name('karyawan.destroy');

Route::get('/produk', [App\Http\Controllers\ProdukController::class, 'index'])->name('produk');
Route::get('/produk/tambah', [App\Http\Controllers\ProdukController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [App\Http\Controllers\ProdukController::class, 'store'])->name('produk.store');
Route::get('/produk/{id}/edit', [App\Http\Controllers\ProdukController::class, 'edit'])->name('produk.edit');
Route::delete('/produk/{id}/hapus', [App\Http\Controllers\ProdukController::class, 'destroy'])->name('produk.destroy');

Route::get('/penjualan', [App\Http\Controllers\PenjualanController::class, 'index'])->name('penjualan');
Route::get('/penjualan/tambah', [App\Http\Controllers\PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan/store', [App\Http\Controllers\PenjualanController::class, 'store'])->name('penjualan.store');
Route::get('/penjualan/{id}/edit', [App\Http\Controllers\PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::delete('/penjualan/{id}/hapus', [App\Http\Controllers\PenjualanController::class, 'destroy'])->name('penjualan.destroy');

Route::get('/penjualanHasProduk', [App\Http\Controllers\PenjualanHasProdukController::class, 'index'])->name('penjualanHasProduk');
Route::get('/penjualanHasProduk/tambah', [App\Http\Controllers\PenjualanHasProdukController::class, 'create'])->name('penjualanHasProduk.create');
Route::post('/penjualanHasProduk/store', [App\Http\Controllers\PenjualanHasProdukController::class, 'store'])->name('penjualanHasProduk.store');
Route::get('/penjualanHasProduk/{id}/edit', [App\Http\Controllers\PenjualanHasProdukController::class, 'edit'])->name('penjualanHasProduk.edit');
Route::delete('/penjualanHasProduk/{id}/hapus', [App\Http\Controllers\PenjualanHasProdukController::class, 'destroy'])->name('penjualanHasProduk.destroy');

Route::get('/', [App\Http\Controllers\HomeController::class, 'index']);
