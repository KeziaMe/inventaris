<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KondisiBarang;

class KondisiBarangController extends Controller
{
    //
    public function kondisibarangView()
    {
        $data['allDataKondisiBarang'] = KondisiBarang::all();
        return view("admin.kelola_data.kondisi_barang.view_kondisi_barang", $data);
    }

    public function kondisibarangTambah()
    {
        return view("admin.kelola_data.kondisi_barang.tambah_kondisi_barang");
    }

    public function kondisibarangStore(Request $request)
    {
        $validateData = $request->validate([
            'textKondisibarang' => 'required',

        ]);

        $data = new KondisiBarang();
        $data->kondisi_brg = $request->textKondisibarang;
        $data->save();

        return redirect()->route('kondisibarang.view');
    }

    public function kondisibarangEdit($id)
    {
        $editDataKondisiBarang = KondisiBarang::find($id);
        return view("admin.kelola_data.kondisi_barang.Edit_kondisi_barang", compact('editDataKondisiBarang'));
    }

    public function kondisibarangUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textKondisibarang' => 'required',
        ]);

        $data = Kondisibarang::find($id);
        $data->kondisi_brg = $request->textKondisibarang;
        $data->save();

        return redirect()->route('kondisibarang.view');
    }
}
