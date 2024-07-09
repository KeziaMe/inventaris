<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    //
    public function ruanganView()
    {
        return view("admin.kelola_data.ruangan.view_ruangan");
    }

    public function ruanganTambah()
    {
        return view("admin.kelola_data.ruangan.tambah_ruangan");
    }

    public function ruanganEdit()
    {
        return view("admin.kelola_data.ruangan.edit_ruangan");
    }
}
