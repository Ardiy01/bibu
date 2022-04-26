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
            'updated_at' => '2022-04-04'
        ]);

        DB::table('pengeluarans')->insert([
            'jumlah' => 40000,
            'deskripsi' => 'Beli ubi cilembu',
            'updated_at' => '2022-05-04'
        ]);
        
        DB::table('pengeluarans')->insert([
            'jumlah' => 100000,
            'deskripsi' => 'Beli Gas',
            'updated_at' => '2022-06-04'
        ]);
    }
}
