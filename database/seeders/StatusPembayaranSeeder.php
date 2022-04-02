<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StatusPembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('status_pembayarans')->insert([
            'status_pembayaran' => 'Lunas'
        ]);

        DB::table('status_pembayarans')->insert([
            'status_pembayaran' => 'Belum Lunas'
        ]);
    }
}
