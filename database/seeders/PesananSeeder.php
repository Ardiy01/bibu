<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('pesanans')->insert([
            'id_user' => 2,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-1',
            'updated_at' => '2022-4-1', 
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 3,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 1,
            'bukti_pembayaran' => 'BP001.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-1',
            'updated_at' => '2022-4-1',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 4,
            'id_produk' => 1,
            'jumlah_produk' => 1,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 15000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-2',
            'updated_at' => '2022-4-2',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 5,
            'id_produk' => 1,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 3,
            'bukti_pembayaran' => 'BP002.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 2,
            'ongkir' => 16000,
            'harga_produk' => 15000,
            'no_resi' => 'JP6675645910',
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-2',
            'updated_at' => '2022-4-2',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 6,
            'id_produk' => 2,
            'jumlah_produk' => 3,
            'id_metode_pembayaran' => 4,
            'bukti_pembayaran' => 'BP003.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-2',
            'updated_at' => '2022-4-2',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 7,
            'id_produk' => 1,
            'jumlah_produk' => 1,
            'id_metode_pembayaran' => 2,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 15000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-3',
            'updated_at' => '2022-4-3',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 8,
            'id_produk' => 1,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 5,
            'bukti_pembayaran' => 'BP004.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 2,
            'ongkir' => 16000,
            'harga_produk' => 15000,
            'no_resi' => 'JP3272583550',
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-3',
            'updated_at' => '2022-4-3',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 9,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 3,
            'bukti_pembayaran' => 'BP005.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-3',
            'updated_at' => '2022-4-3',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 10,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-3',
            'updated_at' => '2022-4-3',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 11,
            'id_produk' => 1,
            'jumlah_produk' => 1,
            'id_metode_pembayaran' => 6,
            'bukti_pembayaran' => 'BP006.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 2,
            'ongkir' => 8000,
            'harga_produk' => 15000,
            'no_resi' => 'JP3282583551',
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-3',
            'updated_at' => '2022-4-3',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 12,
            'id_produk' => 2,
            'jumlah_produk' => 3,
            'id_metode_pembayaran' => 7,
            'bukti_pembayaran' => 'BP007.png',
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'harga_produk' => 22000,
            'id_status_pesanan' => 4,
            'created_at' => '2022-4-4',
            'updated_at' => '2022-4-4',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 1,
            'id_produk' => 2,
            'jumlah_produk' => 3,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
            'harga_produk' => 22000,
            'deskripsi' => 'Pembelian oleh Siva',
            'created_at' => '2022-4-4',
            'updated_at' => '2022-4-4',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 1,
            'id_produk' => 2,
            'jumlah_produk' => 2,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
            'harga_produk' => 22000,
            'deskripsi' => 'Pembelian oleh Martin',
            'created_at' => '2022-3-4',
            'updated_at' => '2022-3-4',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 1,
            'id_produk' => 2,
            'jumlah_produk' => 5,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
            'harga_produk' => 22000,
            'deskripsi' => 'Pembelian oleh Tina',
            'created_at' => '2022-3-1',
            'updated_at' => '2022-3-1',
        ]);

        DB::table('pesanans')->insert([
            'id_user' => 1,
            'id_produk' => 2,
            'jumlah_produk' => 4,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
            'harga_produk' => 22000,
            'deskripsi' => 'Pembelian oleh Salma',
            'created_at' => '2022-5-1',
            'updated_at' => '2022-5-1',
        ]);
        DB::table('pesanans')->insert([
            'id_user' => 1,
            'id_produk' => 2,
            'jumlah_produk' => 5,
            'id_metode_pembayaran' => 1,
            'id_status_pembayaran' => 1,
            'id_pengiriman' => 1,
            'id_status_pesanan' => 4,
            'harga_produk' => 22000,
            'deskripsi' => 'Pembelian oleh Salma',
            'created_at' => '2022-5-1',
            'updated_at' => '2022-5-1',
        ]);
    }
}
