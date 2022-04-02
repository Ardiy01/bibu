<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengirimanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengirimen')->insert([
            'nama_pengiriman' => 'Pick up',
        ]);

        DB::table('pengirimen')->insert([
            'nama_pengiriman' => 'Ekspedisi JNT',
        ]);
    }
}
