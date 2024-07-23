<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;

class BarangController extends Controller
{
    //
    public function barangView()
    {
        $data['allDataBarang'] = Barang::all();
        return view("admin.kelola_data.barang.view_barang", $data);
    }
    public function barangTambah()
    {
        return view("admin.kelola_data.barang.tambah_barang");
    }
    public function barangEdit($id)
    {
        $editDataBarang = Barang::find($id);
        return view("admin.kelola_data.barang.edit_barang", compact('editDataBarang'));
    }
    public function barangUnduh()
    {
        return view("admin.kelola_data.barang.unduh_barang");
    }

    public function barangStore(Request $request)
    {
        $validateData = $request->validate([
            'textKodebrg' => 'required',

        ]);

        $data = new Barang();
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->kondisi_brg = $request->textKondisibrg;
        $data->ket = $request->textKet;
        $data->tgl_masuk = $request->textTglmasuk;
        $data->tgl_update = $request->textTglUpdate;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        return redirect()->route('barang.view');
    }

    public function barangUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textKodebrg' => 'required',
        ]);

        $data = Barang::find($id);
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->kondisi_brg = $request->textKondisibrg;
        $data->ket = $request->textKet;
        $data->tgl_masuk = $request->textTglmasuk;
        $data->tgl_update = $request->textTglUpdate;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        return redirect()->route('barang.view');
    }

    public function barangHapus($id)
    {
        $hapusDataBarang = Barang::find($id);
        $hapusDataBarang->delete();

        return redirect()->route('barang.view');
    }
}
