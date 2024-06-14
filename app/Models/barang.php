<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $fillable = [
        'nama_barang',
        'kategori',
        'nama_lokasi',
        'nama_cabang',
        'kode_barang',
        'gambar',
        'tanggal'
    ];

    public function komponens()
    {
        return $this->hasMany(Komponen::class, 'id_barang');
    }

    public function perawatan()
    {
        return $this->hasMany(Perawatan::class, 'id_barang');
    }

    public function lokasis()
    {
        return $this->belongsTo(Lokasi::class, 'nama_lokasi', 'id');
    }

    public function cabangs()
    {
        return $this->belongsTo(Cabang::class, 'nama_cabang', 'id');
    }

    public function kategoris()
    {
        return $this->belongsTo(kategori::class, 'kategori', 'id');
    }
}

