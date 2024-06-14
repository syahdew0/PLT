<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::unprepared('
            CREATE TRIGGER after_insert_komponen
            AFTER INSERT ON komponen
            FOR EACH ROW
            BEGIN
                INSERT INTO riwayat_perubahan (id_barang, jenis_perubahan, id_komponen, keterangan, created_at, updated_at)
                VALUES (NEW.id_barang, \'Komponen\', NEW.id, \'Penambahan komponen\', NOW(), NOW());
            END
        ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared('DROP TRIGGER IF EXISTS after_insert_komponen');
    }
};
