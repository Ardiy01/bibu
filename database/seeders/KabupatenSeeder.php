<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KabupatenSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('kabupatens')->insert([
            'nama_kabupaten' => 'Jember'
        ]);
        DB::table('kabupatens')->insert([
            'nama_kabupaten' => 'Bondowoso'
        ]);
        DB::table('kabupatens')->insert([
            'nama_kabupaten' => 'Banyuwangi'
        ]);
    }
}
