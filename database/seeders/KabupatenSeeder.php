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
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Pacitan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Ponorogo']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Trenggalek']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Tulungagung']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Blitar']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Kediri']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Malang']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Lumajang']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Jember']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Banyuwangi']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Bondowoso']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Situbondo']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Probolinggo']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Pasuruan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Sidoarjo']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Mojokerto']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Jombang']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Nganjuk']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Madiun']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Magetan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Ngawi']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Bojonegoro']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Tuban']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Lamongan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Gresik']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Bangkalan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Sampang']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Pamekasan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kab. Sumenep']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Kediri']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Blitar']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Malang']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Probolinggo']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Pasuruan']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Mojokerto']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Madiun']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Surabaya']);
        DB::table('kabupatens')->insert(['nama_kabupaten' => 'Kota Batu']);
    }
}
