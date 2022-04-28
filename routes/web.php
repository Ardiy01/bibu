<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UlasanController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\RiwayatPesananController;
use App\Http\Controllers\ProfilController;

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
    return view('welcome');
});

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resources([
    '/dashboard/produk' => ProdukController::class,
    '/dashboard/pesanan' => PesananController::class,
    '/dashboard/riwayat/pesanan' => RiwayatPesananController::class,
    '/dashboard/produk/ulasan' => UlasanController::class,
    '/dashboard/transaksi' => TransaksiController::class,
    '/dashboard/profil' => ProfilController::class,
    '/dashboard/customer' => CustomerController::class
]);
