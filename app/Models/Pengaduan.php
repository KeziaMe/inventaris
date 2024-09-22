<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaduan extends Model
{
    use HasFactory;

    // Tentukan properti yang dapat diisi (mass-assignable)
    protected $fillable = [
        'tanggal_pengaduan',
        'kondisi_barang',
        'nama_status_pengaduan',
        'tanggal_update',
        'inventarisasi_id',
        'barang_id',
        'status_pengaduan_id'
    ];

    /**
     * Relasi ke model StatusPengaduan.
     * Setiap pengaduan memiliki satu status pengaduan.
     */
    public function statusPengaduan()
    {
        return $this->belongsTo(StatusPengaduan::class, 'status_pengaduan_id');
    }

    /**
     * Relasi ke model Inventarisasi.
     * Setiap pengaduan berhubungan dengan satu inventarisasi.
     */
    public function inventarisasi()
    {
        return $this->belongsTo(Inventarisasi::class, 'inventarisasi_id');
    }

    /**
     * Relasi ke model Barang.
     * Setiap pengaduan terkait dengan satu barang.
     */
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }

    /**
     * Ambil informasi status pengaduan yang di-relasi-kan.
     */
    public function getStatusNamaAttribute()
    {
        return $this->statusPengaduan ? $this->statusPengaduan->nama_status : 'Status tidak tersedia';
    }

    /**
     * Ambil informasi inventarisasi terkait.
     */
    public function getInventarisasiKodeAttribute()
    {
        return $this->inventarisasi ? $this->inventarisasi->kode_barang : 'Kode tidak tersedia';
    }

    /**
     * Ambil informasi barang terkait.
     */
    public function getNamaBarangAttribute()
    {
        return $this->barang ? $this->barang->nm_brg : 'Nama barang tidak tersedia';
    }
}
