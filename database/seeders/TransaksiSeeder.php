<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transaksis')->insert([
            'kategori' => 'Pemasukan',
            'deskripsi' => 'Pemasukan pada pembelian ubi cilembu'
        ]);

        DB::table('transaksis')->insert([
            'kategori' => 'Pengeluaran',
            'deskripsi' => 'Pengeluaran untuk kebutuhan usaha ubi cilembu'
        ]);
    }
}
