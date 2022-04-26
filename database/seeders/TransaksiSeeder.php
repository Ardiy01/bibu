<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'keterangan' => 'Pembelian gas',
            'nominal' => 20000,
            'id_pengeluaran' => 1,
            'id_jenis_transaksi' => 2,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 40000,
            'id_jenis_transaksi' => 1,
            'updated_at' => Carbon::now()
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 40000,
            'id_pengeluaran' => 2,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Beli ubi cilembu',
            'updated_at' => '2022-04-04'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 40000,
            'id_pengeluaran' => 3,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Beli ubi cilembu',
            'updated_at' => '2022-05-04'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 10000,
            'id_pengeluaran' => 4,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Beli Gas',
            'updated_at' => '2022-06-04'
        ]);
    }
}
