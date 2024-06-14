<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cabang extends Model
{
    use HasFactory;

    protected $table = 'cabangs';

    protected $fillable = [
        'nama_cabang'
    ];

    public function barang()
    {
        return $this->hasMany(Barang::class, 'nama_cabang', 'nama_cabang');
    }
}
