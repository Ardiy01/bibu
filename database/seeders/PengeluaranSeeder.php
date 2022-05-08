<?php

namespace Database\Seeders;

use Carbon\Carbon;
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
            'keterangan' => 'Gas',
            'nominal' => 18000,
            'updated_at' => Carbon::now(),
        ]);

        DB::table('pengeluarans')->insert([
            'nominal' => 40000,
            'keterangan' => 'Keranjang',
            'updated_at' => '2022-04-04'
        ]);

        DB::table('pengeluarans')->insert([
            'nominal' => 40000,
            'keterangan' => 'Plastik',
            'updated_at' => '2022-05-04'
        ]);

        DB::table('pengeluarans')->insert([
            'nominal' => 36000,
            'keterangan' => 'Gas Elpiji',
            'updated_at' => '2022-05-04'
        ]);
    }
}
