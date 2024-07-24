<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    //
    public function jenisbarangView()
    {
        $data['allDataJenisBarang'] = JenisBarang::all();
        return view("admin.kelola_data.jenis_barang.view_jenis_barang", $data);
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
