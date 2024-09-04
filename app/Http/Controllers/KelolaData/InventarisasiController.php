<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventarisasi;
use App\Models\Ruangan;

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
        $data->status = $request->textstatus; // Mengambil nilai dari radio button yang dipilih
        $data->save();

        return redirect()->route('inventarisasi.view');
    }


    public function inventarisasiTambah()
    {
        $ruangan = Ruangan::all();
        return view("admin.kelola_data.inventarisasi.tambah_inventarisasi", compact('ruangan'));
    }

    public function inventarisasiEdit($id)
    {
        $ruangan = Ruangan::all();
        $editDataInventarisasi = Inventarisasi::find($id);
        return view("admin.kelola_data.inventarisasi.Edit_inventarisasi", compact('editDataInventarisasi', 'ruangan'));
    }

    public function inventarisasiUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textNamaRuangan' => 'required',
        ]);

        $data = Inventarisasi::find($id);
        $data->nm_ruangan = $request->textNamaRuangan;
        $data->kd_brg = $request->textKodeBarang;
        $data->tgl_inventaris = $request->textTglInventaris;
        $data->status = $request->textstatus;
        $data->save();

        return redirect()->route('inventarisasi.view');
    }

    public function inventarisasiHapus($id)
    {
        $hapusDataInventarisasi = Inventarisasi::find($id);
        $hapusDataInventarisasi->delete();

        return redirect()->route('inventarisasi.view');
    }
}
