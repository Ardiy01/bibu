<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTriggersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared("
        CREATE TRIGGER insert_pesanan AFTER INSERT ON pesanans FOR EACH ROW
            BEGIN
                UPDATE produks SET stok = stok - NEW.jumlah_produk
                WHERE id = NEW.id_produk;
            END
        ");

        DB::unprepared("
        CREATE TRIGGER up_pesanan AFTER UPDATE ON pesanans FOR EACH ROW
            BEGIN
                UPDATE produks SET stok = stok - (NEW.jumlah_produk - OLD.jumlah_produk)
                WHERE id = NEW.id_produk;
            END
        ");

        // DB::unprepared("
        // CREATE TRIGGER create_ulasan BEFORE INSERT ON pesanans FOR EACH ROW
        //     BEGIN
        //         INSERT INTO ulasans (id_pesanan) Values (1);
        //     END
        // ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER "insert_order"');
        DB::unprepared('DROP TRIGGER "up_order"');
        DB::unprepared('DROP TRIGGER "create_ulasan"');
    }
}
