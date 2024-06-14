<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class lokasi extends Model
{
    use HasFactory;

    protected $table = 'lokasis';

    protected $fillable = [
        'nama_lokasi'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'nama_lokasi', 'nama_lokasi');
    }
}
