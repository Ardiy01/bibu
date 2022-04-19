<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JenisProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('jenis_produks')->insert([
            'jenis_produk' => 'Mentah'
        ]);

        DB::table('jenis_produks')->insert([
            'jenis_produk' => 'Matang'
        ]);
    }
}
