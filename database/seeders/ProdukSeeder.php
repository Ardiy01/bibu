<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('produks')->insert([
            'nama_produk' => 'Ubi Cilembu Mentah',
            'harga' => 15000,
            'stok' => 500,
            'gambar' => 'produkmentah.png',
            'keterangan' => 'ubi jalar yang belum diolah yang ditanam di Desa Cilembu yang memiliki rasa manis'
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Ubi Cilembu Bakar',
            'harga' => 22000,
            'stok' => 300,
            'gambar' => 'produkbakar.png',
            'keterangan' => 'ubi jalar khas cilembu yang melalui proses pemanggangan dan memiliki rasa manis yang didalamnya mengeluarkan cairan madu. '
        ]);
    }
}
