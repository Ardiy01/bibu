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
            'keterangan' => 'Ubi Cilembu tidak melalui proses pemanggangan'
        ]);

        DB::table('produks')->insert([
            'nama_produk' => 'Ubi Cilembu Bakar',
            'harga' => 22000,
            'stok' => 300,
            'gambar' => 'produkbakar.png',
            'keterangan' => 'Ubi Cilembu proses pemanggangan'
        ]);
    }
}
