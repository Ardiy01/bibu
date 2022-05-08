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
            'keterangan' => 'Gas',
            'nominal' => 18000,
            'id_pengeluaran' => 1,
            'id_jenis_transaksi' => 2,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 40000,
            'id_pengeluaran' => 3,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Plastik',
            'updated_at' => '2022-05-04'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 36000,
            'id_pengeluaran' => 4,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Gas Elpiji',
            'updated_at' => '2022-05-04'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 88000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-05-01'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 110000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-05-01'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 66000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-04'
        ]);


        DB::table('transaksis')->insert([
            'nominal' => 40000,
            'id_pengeluaran' => 2,
            'id_jenis_transaksi' => 2,
            'keterangan' => 'Keranjang',
            'updated_at' => '2022-04-04'
        ]);

        
        DB::table('transaksis')->insert([
            'nominal' => 15000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);


        DB::table('transaksis')->insert([
            'nominal' => 46000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 44000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 44000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 23000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 66000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 16000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 44000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 15000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 46000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-03'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 66000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-02'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 44000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-04-01'
        ]);

        DB::table('transaksis')->insert([
            'nominal' => 44000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-03-04'
        ]);
        
        DB::table('transaksis')->insert([
            'nominal' => 110000,
            'id_jenis_transaksi' => 1,
            'updated_at' => '2022-03-01'
        ]);

        

        

        

       


        

        
    }
}
