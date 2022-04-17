<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UlasanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 2,
            'rating' => 4,
            'ulasan' => 'Rasanya manis, enak',
            'id_pesanan' => 1,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 3,
            'rating' => 5,
            'ulasan' => 'Matangnya rata, manis',
            'id_pesanan' => 2,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 4,
            'rating' => 5,
            'ulasan' => 'packingnya rapi',
            'id_pesanan' => 3,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 5,
            'rating' => 4,
            'ulasan' => 'Udah langganan disini, produk ubinya berkualitas',
            'id_pesanan' => 4,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 6,
            'rating' => 5,
            'ulasan' => 'Ubinya enak, lembut, gurih',
            'id_pesanan' => 5,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 7,
            'rating' => 4,
            'ulasan' => 'Packingnya rapi',
            'id_pesanan' => 6,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 8,
            'rating' => 5,
            'ulasan' => 'mantep banget bikin ketagihan. Sengaja beli mentah biar awet :v tinggal bakar sendiri',
            'id_pesanan' => 7,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 9,
            'rating' => 5,
            'ulasan' => 'Rasanya manis dan gurih,cocok buat anak - anak ataupun orang dewasa. Apalagi kalo hujan" gini',
            'id_pesanan' => 8,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 10,
            'rating' => 4,
            'ulasan' => 'Ubinya enak banget mantap',
            'id_pesanan' => 9,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 11,
            'rating' => 5,
            'ulasan' => 'Ubinya berkualitas, teksturnya lembut top deh',
            'id_pesanan' => 10,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 2,
            'id_user' => 12,
            'rating' => 4,
            'ulasan' => 'Mantap banget besok beli lagi',
            'id_pesanan' => 11,
        ]);

        DB::table('ulasans')->insert([
            'id_produk' => 1,
            'id_user' => 1,
            'id_pesanan' => 12,
        ]);


    }
}