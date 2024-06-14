<?php

namespace App\Models;
// app/Models/RiwayatPerubahan.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatPerubahan extends Model
{
    use HasFactory;

    protected $table = 'riwayat_perubahan';

    protected $fillable = [
        'id_barang',
        'jenis_perubahan',
        'id_komponen',
        'id_perawatan',
        'keterangan',
    ];

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }

    public function komponen()
    {
        return $this->belongsTo(Komponen::class, 'id_komponen');
    }

    public function perawatan()
    {
        return $this->belongsTo(Perawatan::class, 'id_perawatan');
    }
}

