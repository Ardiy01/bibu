<?php

namespace Database\Seeders;


use Illuminate\Database\Seeder;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\UlasanSeeder;
use Database\Seeders\PesananSeeder;
use Database\Seeders\KabupatenSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\TransaksiSeeder;
use Database\Seeders\PengirimanSeeder;
use Database\Seeders\JenisProdukSeeder;
use Database\Seeders\PengeluaranSeeder;
use Database\Seeders\StatusPesananSeeder;
use Database\Seeders\JenisTransaksiSeeder;
use Database\Seeders\MetodePembayaranSeeder;
use Database\Seeders\StatusPembayaranSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            KecamatanSeeder::class,
            KabupatenSeeder::class,
            JenisProdukSeeder::class,
            JenisTransaksiSeeder::class,
            ProdukSeeder::class,
            UserSeeder::class,
            StatusPesananSeeder::class,
            PengirimanSeeder::class,
            MetodePembayaranSeeder::class,
            StatusPembayaranSeeder::class,
            // PengeluaranSeeder::class,
            // PesananSeeder::class,
            // UlasanSeeder::class,
            // TransaksiSeeder::class,
        ]);
    }
}
