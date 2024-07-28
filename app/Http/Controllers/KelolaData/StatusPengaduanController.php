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

    public function statuspengaduanTambah()
    {
        return view("admin.kelola_data.status_pengaduan.tambah_status_pengaduan");
    }


    public function statuspengaduanStore(Request $request)
    {
        $validateData = $request->validate([
            'textStatuspengaduan' => 'required',

        ]);

        $data = new StatusPengaduan();
        $data->status_pengaduan = $request->textStatuspengaduan;
        $data->save();

        return redirect()->route('statuspengaduan.view');
    }
}
