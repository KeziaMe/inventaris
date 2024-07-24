<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JenisBarang;

class JenisBarangController extends Controller
{
    //
    public function jenisbarangView()
    {
        $data['allDataJenisBarang'] = JenisBarang::all();
        return view("admin.kelola_data.jenis_barang.view_jenis_barang", $data);
    }
    public function jenisbarangTambah()
    {
        return view("admin.kelola_data.jenis_barang.Tambah_jenis_barang");
    }
    public function jenisbarangEdit($id)
    {
        $editDataJenisBarang = JenisBarang::find($id);
        return view("admin.kelola_data.jenis_barang.Edit_jenis_barang", compact('editDataJenisBarang'));
    }

    public function jenisbarangStore(Request $request)
    {
        $validateData = $request->validate([
            'textJenisBarang' => 'required',

        ]);

        $data = new JenisBarang();
        $data->jns_brg = $request->textJenisBarang;
        $data->save();

        return redirect()->route('jenisbarang.view');
    }

    public function jenisbarangUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textJenisBarang' => 'required',
        ]);

        $data = JenisBarang::find($id);
        $data->jns_brg = $request->textJenisBarang;
        $data->save();

        return redirect()->route('jenisbarang.view');
    }

    public function jenisbarangHapus($id)
    {
        $hapusDataJenisBarang = JenisBarang::find($id);
        $hapusDataJenisBarang->delete();

        return redirect()->route('jenisbarang.view');
    }
}
