<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DashboardController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

// login
Route::get('/', [LoginController::class, 'index']);

// registrasi
Route::get('/registrasi', [RegistrasiController::class, 'create']);
Route::post('/registrasi', [RegistrasiController::class, 'store']);

Route::get('/dashboard', [DashboardController::class, 'index']);

Route::resources([
    '/dashboard/produk' => ProdukController::class,
    '/dashboard/pesanan' => PesananController::class,
    '/dashboard/riwayat/pesanan' => RiwayatPesananController::class,
    'dashboard/produk/ulasan' => UlasanController::class,
    '/dashboard/transaksi' => TransaksiController::class,
    '/dashboard/profil' => ProfilController::class,
    '/dashboard/customer' => CustomerController::class
]);
