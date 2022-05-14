<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->string('keterangan')->default('Pendapatan');
            $table->double('nominal');
            $table->foreignId('id_jenis_transaksi');
            $table->foreignId('id_pengeluaran')->nullable();
            $table->timestamps();

            $table->foreign('id_jenis_transaksi')->references('id')->on('jenis_transaksis');
            $table->foreign('id_pengeluaran')->references('id')->on('pengeluarans');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transaksis');
    }
}
