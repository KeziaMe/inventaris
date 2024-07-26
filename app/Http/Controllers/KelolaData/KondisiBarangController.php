<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KondisiBarangController extends Controller
{
    //
    public function kondisibarangView()
    {
        return view("admin.kelola_data.kondisi_barang.view_kondisi_barang");
    }
}
