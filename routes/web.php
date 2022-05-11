<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\ProfilController;
use App\Http\Controllers\RegistrasiController;


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

Route::get('/',[HomeController::class, 'index'])->middleware('guest');
// registrasi
Route::get('/registrasi', [RegistrasiController::class, 'create'])->middleware('guest');
Route::post('/registrasi', [RegistrasiController::class, 'store']);

// login
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'cekLogin']);
Route::post('/logout', [LoginController::class, 'logout']);


Route::get('/dashboard', [DashboardController::class, 'index'])->middleware('auth');

Route::resource('/dashboard/produk', ProdukController::class)->middleware('auth');
Route::resource('/dashboard/pesanan', PesananController::class)->middleware('auth');
Route::resource('/dashboard/riwayat/pesanan', RiwayatPesananController::class)->middleware('auth');
Route::resource('dashboard/produk/ulasan', UlasanController::class)->middleware('auth');
Route::resource('/dashboard/transaksi', TransaksiController::class)->middleware('auth');
Route::resource('/dashboard/profil', ProfilController::class)->middleware('auth');
Route::resource('/dashboard/customer', CustomerController::class)->middleware('auth');
