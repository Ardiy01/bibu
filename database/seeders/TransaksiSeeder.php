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
    }
}
