<?php

namespace App\Http\Controllers\upload;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Nota;
use Illuminate\Support\Facades\Storage;

class NotaController extends Controller
{
    //
    public function notaUpload()
    {
        return view("admin.upload.nota");
    }
    public function notaStore(Request $request)
    {
        $validateData = $request->validate([
            'textNota' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // validasi image
            'textKeterangan' => 'required',
        ]);

        $data = new Nota();

        if ($request->file('textNota')) {
            $textNota = $request->file('textNota')->store('nota/foto_nota', 'public');
            $data->foto_nota = $textNota;
        } else {
            $data->foto_nota = '';
        }

        $data->keterangan = $request->textKeterangan;
        $data->save();

        return redirect()->route('nota.arsip')->with('message', 'berhasil tambah nota');
    }
    public function arsipNota()
    {
        $data['allDataNota'] = Nota::all();
        return view("admin.upload.arsip_nota", $data);
    }
    public function detailNota($id)
    {
        $viewNota = Nota::find($id);
        return view("admin.upload.detail_nota", compact('viewNota'));
    }

    public function hapusNota($id)
    {
        $deleteNota = Nota::find($id);
        if ($deleteNota) {
            // Delete the photo from storage if exists
            if ($deleteNota->foto_nota && Storage::disk('public')->exists($deleteNota->foto_nota)) {
                Storage::disk('public')->delete($deleteNota->foto_nota);
            }

            // Delete the siswa data from database
            $deleteNota->delete();

            return redirect()->route('nota.arsip');
        }
    }
}
