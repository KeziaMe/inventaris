<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Barang extends Model
{
    use HasFactory;

    public function getTglMasukAttribute($value)
    {
        return Carbon::parse($value);
    }

    // Accessor untuk tgl_update
    public function getTglUpdateAttribute($value)
    {
        return Carbon::parse($value);
    }

    public function KondisiBarang()
    {
        return $this->belongsTo(KondisiBarang::class);
    }

    public function JenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }

    public function pengaduan()
    {
        return $this->hasMany(Pengaduan::class, 'id_inventarisasi', 'kd_brg');
    }

    public function inventarisasi()
    {
        return $this->hasMany(Inventarisasi::class);
    }
}
