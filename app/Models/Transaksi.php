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

    public function pengeluaran()
    {
        return $this->hasMany(Pengeluaran::class);
    }

    public function pesanan()
    {
        return $this->hasMany(Pesanan::class);
    }
}
