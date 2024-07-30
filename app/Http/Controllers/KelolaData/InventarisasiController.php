<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventarisasi;

class InventarisasiController extends Controller
{
    //

    public function inventarisasiView()
    {
        $data['allDataInventarisasi'] = Inventarisasi::all();
        return view("admin.kelola_data.inventarisasi.view_inventarisasi", $data);
    }

    public function inventarisasiStore(Request $request)
    {
        $validateData = $request->validate([
            'textNamaRuangan' => 'required',

        ]);

        $data = new Inventarisasi();
        $data->nm_ruangan = $request->textNamaRuangan;
        $data->kd_brg = $request->textKodeBarang;
        $data->tgl_inventaris = $request->textTglInventaris;
        $data->status = $request->textStatus;
        $data->save();

        return redirect()->route('inventarisasi.view');
    }

    public function inventarisasiTambah()
    {
        return view("admin.kelola_data.inventarisasi.tambah_inventarisasi");
    }

}
