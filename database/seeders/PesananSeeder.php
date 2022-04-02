<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pesanans')->insert([
            'id_user' => 2,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
        ]);
    }
}
