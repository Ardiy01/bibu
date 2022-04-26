<?php

namespace App\Models;

use App\Models\Pesanan;
use App\Models\Pengeluaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaksi extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function jenis_transaksi()
    {
        return $this->belongsTo(JenisTransaksi::class, 'id_jenis_transaksi');
    }

    public function pengeluaran()
    {
        return $this->belongsTo(Pengeluaran::class, 'id_pengeluaran');
    }
}
