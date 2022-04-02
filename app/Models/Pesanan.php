<?php

namespace App\Models;

use App\Models\User;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\Pengiriman;
use App\Models\StatusPesanan;
use App\Models\MetodePembayaran;
use App\Models\StatusPembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pesanan extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    const CREATED_AT = 'tanggal_pesanan';
    const UPDATE_AT = 'tanggal_update';

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class);
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }

    public function statuspesanan()
    {
        return $this->belongsTo(StatusPesanan::class);
    }

    public function statuspembayaran()
    {
        return $this->belongsTo(StatusPembayaran::class);
    }

    public function pengiriman()
    {
        return $this->belongsTo(Pengiriman::class);
    }

    public function metodepembayaran()
    {
        return $this->belongsTo(MetodePembayaran::class);
    }

}
