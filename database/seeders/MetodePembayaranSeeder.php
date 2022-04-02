<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MetodePembayaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'Tunai'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'M-banking (BRI)',
            'no_rekening' => '88789678'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'M-banking (Mandiri)',
            'no_rekening' => '88767890765'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'OVO',
            'no_rekening' => '086789876986'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'M-banking (BCA)',
            'no_rekening' => '7896754'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'DANA',
            'no_rekening' => '08675645690'
        ]);

        DB::table('metode_pembayarans')->insert([
            'metode_pembayaran' => 'M-banking (BNI)',
            'no_rekening' => '99786745'
        ]);
    }
}
