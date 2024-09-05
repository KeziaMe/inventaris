<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    public function StatusPengaduan()
    {
        return $this->belongsTo(StatusPengaduan::class);
    }

    public function inventarisasi()
    {
        return $this->belongsTo(Inventarisasi::class);
    }
}
