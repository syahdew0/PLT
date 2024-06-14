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
        Schema::create('verifikasi', function (Blueprint $table) {
            $table->id();
            $table->string('user')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->string('nama_table')->charset('utf8mb4')->collation('utf8mb4_unicode_ci');
            $table->integer('id_data');
            $table->enum('status', ['Menunggu', 'Selesai']);
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
        Schema::dropIfExists('verifikasi');
    }
};
