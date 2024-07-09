<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class JenisBarangController extends Controller
{
    //
    public function jenisbarangView()
    {
        return view("admin.kelola_data.jenis_barang.view_jenis_barang");
    }
    public function jenisbarangTambah()
    {
        return view("admin.kelola_data.jenis_barang.Tambah_jenis_barang");
    }
    public function jenisbarangEdit()
    {
        return view("admin.kelola_data.jenis_barang.Edit_jenis_barang");
    }
}
