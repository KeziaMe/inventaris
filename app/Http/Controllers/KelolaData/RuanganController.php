<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ruangan;

class RuanganController extends Controller
{
    //
    public function ruanganView()
    {
        $data['allDataRuangan'] = Ruangan::all();
        return view("admin.kelola_data.ruangan.view_ruangan", $data);
    }

    public function ruanganTambah()
    {
        return view("admin.kelola_data.ruangan.tambah_ruangan");
    }

    public function ruanganEdit()
    {
        return view("admin.kelola_data.ruangan.edit_ruangan");
    }

    public function ruanganStore(Request $request)
    {
        $validateData = $request->validate([
            'textNama' => 'required',

        ]);

        $data = new Ruangan();
        $data->nm_ruangan = $request->textNama;
        $data->save();

        return redirect()->route('ruangan.view');
    }
}
