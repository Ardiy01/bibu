<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Kaliwates'
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Ajung'
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Sumbersari'
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Bondowoso'
        ]);

        DB::table('kecamatans')->insert([
            'nama_kecamatan' => 'Giri'
        ]);
    }
}
