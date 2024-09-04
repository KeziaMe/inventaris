<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    public function KondisiBarang()
    {
        return $this->belongsTo(KondisiBarang::class);
    }

    public function JenisBarang()
    {
        return $this->belongsTo(JenisBarang::class);
    }
}
