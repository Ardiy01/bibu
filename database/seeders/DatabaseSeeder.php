<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\StatusPesanan;
use Illuminate\Database\Seeder;
use App\Models\StatusPembayaran;
use Database\Seeders\UserSeeder;
use Database\Seeders\ProdukSeeder;
use Database\Seeders\UlasanSeeder;
use Database\Seeders\PesananSeeder;
use Database\Seeders\KabupatenSeeder;
use Database\Seeders\KecamatanSeeder;
use Database\Seeders\TransaksiSeeder;
use Database\Seeders\PengirimanSeeder;
use Database\Seeders\PengeluaranSeeder;
use Database\Seeders\StatusPesananSeeder;
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
        // \App\Models\User::factory(10)->create();
        $this->call([
            KecamatanSeeder::class,
            KabupatenSeeder::class,
            ProdukSeeder::class,
            UserSeeder::class,
            UlasanSeeder::class,
            TransaksiSeeder::class,
            StatusPesananSeeder::class,
            PengirimanSeeder::class,
            MetodePembayaranSeeder::class,
            StatusPembayaranSeeder::class,
            PengeluaranSeeder::class,
            PesananSeeder::class,
        ]);
    }
}
