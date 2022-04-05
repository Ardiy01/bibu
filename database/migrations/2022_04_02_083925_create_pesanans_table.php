<?php

use Carbon\Carbon;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePesanansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->foreignId('id_produk');
            $table->tinyInteger('jumlah_produk');
            $table->foreignId('id_metode_pembayaran');
            $table->string('bukti_pembayaran')->nullable();
            $table->foreignId('id_status_pembayaran')->default(2);
            $table->foreignId('id_pengiriman');
            $table->float('ongkir')->nullable();
            $table->string('no_resi', 30)->nullable();
            $table->foreignId('id_status_pesanan')->default(1);
            $table->timestamps();
            $table->foreignId('id_transaksi')->default(1);

            $table->foreign('id_user')->references('id')->on('users');
            $table->foreign('id_produk')->references('id')->on('produks');
            $table->foreign('id_metode_pembayaran')->references('id')->on('metode_pembayarans');
            $table->foreign('id_status_pembayaran')->references('id')->on('status_pembayarans');
            $table->foreign('id_pengiriman')->references('id')->on('pengirimen');
            $table->foreign('id_status_pesanan')->references('id')->on('status_pesanans');
            $table->foreign('id_transaksi')->references('id')->on('transaksis');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pesanans');
    }
}
