<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;

class PengaduanController extends Controller
{
    //
    public function pengaduanView()
    {
        $data['allDataPengaduan'] = Pengaduan::all();
        return view("admin.kelola_data.pengaduan.view_pengaduan", $data);
    }

    public function form_pengaduan()
    {
        return view("admin.form.form_pengaduan");
    }

    public function pengaduanEdit()
    {
        return view("admin.kelola_data.pengaduan.edit_pengaduan");
    }

    public function pengaduanDetail()
    {
        return view("admin.kelola_data.pengaduan.detail_pengaduan");
    }
    public function pengaduanUnduh()
    {
        return view("admin.kelola_data.pengaduan.unduh_pengaduan");
    }
}
