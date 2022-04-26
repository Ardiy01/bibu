<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PengeluaranSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pengeluarans')->insert([
            'jumlah' => 40000,
            'deskripsi' => 'Beli gas',
        ]);

        DB::table('pengeluarans')->insert([
            'jumlah' => 40000,
            'deskripsi' => 'Beli ubi cilembu',
        ]);
    }
}
