<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use Illuminate\Support\Facades\Storage;

class PengaduanController extends Controller
{
    //
    public function pengaduanView()
    {
        $data['allDataPengaduan'] = Pengaduan::all();
        return view("admin.kelola_data.pengaduan.view_pengaduan", $data);
    }

    public function form_pengaduan()
    {
        return view("admin.form.form_pengaduan");
    }

    public function pengaduanEdit($id)
    {
        $editDataPengaduan = Pengaduan::find($id);
        return view("admin.kelola_data.pengaduan.edit_pengaduan", compact('editDataPengaduan'));
    }

    public function pengaduanDetail($id)
    {
        $detailData_pengaduan = Pengaduan::find($id);
        return view("admin.kelola_data.pengaduan.detail_pengaduan", compact('detailData_pengaduan'));
    }
    public function pengaduanUnduh()
    {
        return view("admin.kelola_data.pengaduan.unduh_pengaduan");
    }

    public function pengaduanStore(Request $request)
    {
        $validateData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // menambahkan validasi untuk file image
            'textKeterangan' => 'required',

        ]);

        $data = new Pengaduan();
        $data->tgl_pengaduan = $request->textTglPengaduan;

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('gambar_pengaduan/foto', 'public');
            $data->foto = $foto;
        } else {
            $data->foto = '';
        }

        $data->ket = $request->textKeterangan;
        $data->id_kondisi_brg = $request->textKondisi_brg;
        $data->tgl_masuk = $request->text_tgl_masuk;
        $data->tgl_update = $request->textTgl_update;
        $data->id_inventarisasi = $request->textInventarisasi;
        $data->save();

        return redirect()->route('pengaduan.view');
    }

    public function pengaduanUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // menambahkan validasi untuk file image
            'textKeterangan' => 'required',

        ]);

        $data = Pengaduan::find($id);
        $data->tgl_pengaduan = $request->textTglPengaduan;

        if ($request->file('foto')) {
            $foto = $request->file('foto')->store('gambar_pengaduan/foto', 'public');
            $data->foto = $foto;
        } else {
            $data->foto = '';
        }

        $data->ket = $request->textKeterangan;
        $data->id_kondisi_brg = $request->textKondisi_brg;
        $data->tgl_masuk = $request->text_tgl_masuk;
        $data->tgl_update = $request->textTgl_update;
        $data->id_inventarisasi = $request->textInventarisasi;
        $data->save();

        return redirect()->route('pengaduan.view');
    }
    public function pengaduanHapus($id)
    {
        $deleteDataPengaduan = Pengaduan::find($id);
        if ($deleteDataPengaduan) {
            // Delete the photo from storage if exists
            if ($deleteDataPengaduan->foto && Storage::disk('public')->exists($deleteDataPengaduan->foto)) {
                Storage::disk('public')->delete($deleteDataPengaduan->foto);
            }

            // Delete the siswa data from database
            $deleteDataPengaduan->delete();

            return redirect()->route('pengaduan.view');
        }
    }
}
