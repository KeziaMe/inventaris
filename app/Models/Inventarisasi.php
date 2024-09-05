<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventarisasi extends Model
{
    use HasFactory;

    public function Ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class);
    }

    public function barang()
    {
        return $this->belongsTo(Barang::class, 'kd_brg', 'kd_brg');
    }
}
