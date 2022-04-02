<?php

namespace App\Models;

use App\Models\Ulasan;
use App\Models\Pesanan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function ulasan()
    {
        return $this->hasMany(Ulasan::class);
    }

    public function pesanan()
    {
        return $this->belongsTo(Pesanan::class);
    }
}
