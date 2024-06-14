<?php
// app/Models/Perawatan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perawatan extends Model
{
    use HasFactory;

    protected $table = 'perawatan';

    protected $fillable = [
        'id_barang',
        'tanggal',
        'nomor_dokumen',
        'pelaksana',
        'jenis_kegiatan',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function materials()
    {
        return $this->hasMany(Material::class, 'id_perawatan');
    }
}
