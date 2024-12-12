<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Barang extends Model
{
    use HasFactory;

    public function JenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_inventarisasi', 'kd_brg');
    }

    public function ruangan()
    {
        return $this->belongsTo(Ruangan::class);
    }

}