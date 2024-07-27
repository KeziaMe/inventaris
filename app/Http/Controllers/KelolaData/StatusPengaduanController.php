<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatusPengaduanController extends Controller
{
    //
    public function statuspengaduanView()
    {
        return view("admin.kelola_data.status_pengaduan.view_status_pengaduan");
    }
}
