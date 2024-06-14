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
        Schema::create('perawatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_barang')->nullable()->constrained('barang')->onDelete('cascade');
            $table->date('tanggal')->nullable();
            $table->string('nomor_dokumen')->nullable();
            $table->string('pelaksana')->nullable();
            $table->string('jenis_kegiatan')->nullable();
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
        Schema::dropIfExists('perawatan');
    }
};
