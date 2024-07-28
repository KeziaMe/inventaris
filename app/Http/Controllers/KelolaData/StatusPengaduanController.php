<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\StatusPengaduan;

class StatusPengaduanController extends Controller
{
    //
    public function statuspengaduanView()
    {
        $data['allDataStatusPengaduan'] = StatusPengaduan::all();
        return view("admin.kelola_data.status_pengaduan.view_status_pengaduan", $data);
    }
}
