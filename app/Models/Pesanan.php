<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use App\Models\StatusPesanan;
use App\Models\MetodePembayaran;
use App\Models\StatusPembayaran;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'id_transaksi');
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'id_produk');
    }

    public function status_pesanan()
    {
        return $this->belongsTo(StatusPesanan::class, 'id_status_pesanan');
    }

    public function status_pembayaran()
    {
        return $this->belongsTo(StatusPembayaran::class, 'id_status_pembayaran');
    }

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class, 'id_pengiriman');
    }

    public function metode_pembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class, 'id_metode_pembayaran');
    }

    public function scopeAlamat()
    {
        $alamat = DB::table('users')
        ->join('kecamatans', 'kecamatans.id',  '=',  'users.id_kecamatan')
        ->join('kabupatens', 'kabupatens.id', '=', 'users.id_kabupaten')
        ->select('users.jalan', 'users.nomor', 'kecamatans.nama_kecamatan', 'kabupatens.nama_kabupaten')
                        ->get();

        return $alamat;
    }

}
