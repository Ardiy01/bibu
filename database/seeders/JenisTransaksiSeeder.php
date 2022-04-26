<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_transaksis')->insert([
            'kategori' => 'Pemasukan',
        ]);

        DB::table('jenis_transaksis')->insert([
            'kategori' => 'Pengeluaran',
        ]);
    }
}
