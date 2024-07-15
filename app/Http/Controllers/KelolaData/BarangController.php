<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    //
    public function barangView()
    {
        return view("admin.kelola_data.barang.view_barang");
    }
    public function barangTambah()
    {
        return view("admin.kelola_data.barang.tambah_barang");
    }
    public function barangEdit()
    {
        return view("admin.kelola_data.barang.edit_barang");
    }
    public function barangUnduh()
    {
        return view("admin.kelola_data.barang.unduh_barang");
    }
}
