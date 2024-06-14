<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang')->nullable();
            $table->string('kategori', 40)->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci');
            $table->string('nama_lokasi')->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->nullable();
            $table->string('nama_cabang')->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->nullable();
            $table->string('kode_barang')->charset('utf8mb4')->collation('utf8mb4_0900_ai_ci')->nullable();
            $table->string('gambar')->nullable();
            $table->date('tanggal');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('barang');
    }
}

