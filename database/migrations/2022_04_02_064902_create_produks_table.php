<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->string('nama_produk', 20)->unique();
            $table->float('harga');
            $table->smallInteger('stok');
            $table->string('gambar');
            $table->text('keterangan');
            $table->timestamps();
            $table->foreignId('id_jenis_produk');

            $table->foreign('id_jenis_produk')->references('id')->on('jenis_produks');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produks');
    }
}
