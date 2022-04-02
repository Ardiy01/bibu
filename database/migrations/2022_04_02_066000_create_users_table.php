<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('username', 20)->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->enum('jenis_kelamin', ['Laki - Laki', 'Perempuan']);
            $table->string('nomer_telepon', 12);
            $table->enum('rule', ['Pemilik', 'Customer'])->default('Customer');
            $table->string('jalan');
            $table->string('nomor', 4);
            $table->foreignId('id_kecamatan');
            $table->foreignId('id_kabupaten');
            $table->rememberToken();

            $table->foreign('id_kecamatan')->references('id')->on('kecamatans');
            $table->foreign('id_kabupaten')->references('id')->on('kabupatens');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
