<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_pesanans')->insert([
            'status_pesanan' => 'Belum Diverifikasi'
        ]);
        DB::table('status_pesanans')->insert([
            'status_pesanan' => 'Diproses'
        ]);
        DB::table('status_pesanans')->insert([
            'status_pesanan' => 'Dikirim'
        ]);
        DB::table('status_pesanans')->insert([
            'status_pesanan' => 'Selesai'
        ]);
    }
}
