<?php
// app/Models/Material.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $table = 'material';

    protected $fillable = [
        'material',
        'volume',
        'biaya',
    ];

    public function perawatans()
    {
        return $this->belongsToMany(Perawatan::class, 'material_perawatan', 'material_id', 'perawatan_id')->withPivot('quantity');
    }
}
