<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('riwayat_perubahan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->nullable()->constrained('barang');
            $table->enum('jenis_perubahan', ['Komponen', 'Perawatan'])->nullable();
            $table->foreignId('id_komponen')->nullable()->constrained('komponen')->onDelete('cascade');
            $table->foreignId('id_perawatan')->nullable()->constrained('perawatan');
            $table->timestamp('tanggal_perubahan')->useCurrent();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('riwayat_perubahan');
    }
};
