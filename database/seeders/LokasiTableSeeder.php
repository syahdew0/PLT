<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LokasiTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('lokasis')->insert([
            [
                'nama_lokasi' => 'Lokasi 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nama_lokasi' => 'Lokasi 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
