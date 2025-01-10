<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\JenisBarang;
use App\Models\Pengaduan;
use App\Models\Ruangan;
use Carbon\Carbon; //untuk manipulasi tanggal
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    //
    public function barangView(Request $request)
    {
        $data['allDataBarang'] = Barang::all();
        return view("admin.kelola_data.barang.view_barang", $data);
    }

    public function barangTambah()
    {
        $jenis_barang = JenisBarang::all();
        $ruangan = Ruangan::all();
        return view("admin.kelola_data.barang.tambah_barang", compact('jenis_barang', 'ruangan'));
    }

    public function barangDetail($id)
    {
        $detailData_barang = Barang::with('pengaduan')->find($id);

        // Cek jika barang ditemukan
        if (!$detailData_barang) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan.');
        }


        // Menghitung jumlah total perbaikan untuk barang ini
        $jumlahPerbaikan = $detailData_barang->pengaduan->sum('jumlah_perbaikan');

        return view("admin.kelola_data.barang.detail_barang", compact('detailData_barang', 'jumlahPerbaikan'));
    }

    public function barangEdit($id)
    {
        $jenis_barang = JenisBarang::all();
        $editDataBarang = Barang::find($id);
        $ruangan = Ruangan::all();
        return view("admin.kelola_data.barang.edit_barang", compact('editDataBarang', 'jenis_barang', 'ruangan'));
    }

    public function barangStore(Request $request)
    {
        $validateData = $request->validate([
            'textKodebrg' => 'required',

        ]);

        // Simpan data barang baru
        $data = new Barang();
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->ruangan = $request->textRuangan;
        $data->baik = $request->textBrgBaik;
        $data->kurang_baik = $request->textBrgKurangBaik;
        $data->rusak_berat = $request->textRusakBerat;
        $data->ket = $request->textKet;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        return redirect()->route('barang.view');
    }

    public function barangUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textKodebrg' => 'required',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        $data = Barang::find($id);
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->ruangan = $request->textRuangan;
        $data->baik = $request->textBrgBaik;
        $data->kurang_baik = $request->textBrgKurangBaik;
        $data->rusak_berat = $request->textRusakBerat;
        $data->ket = $request->textKet;
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

    public function barangUnduh(Request $request)
    {
        // Ambil data ruangan yang ada di kolom ruangan pada tabel barang, pastikan data unik
        $ruangan = Barang::select('ruangan')->distinct()->get();

        // Ambil input filter dari request
        $ruanganId = $request->get('unduh_ruangan');

        // Query barang, dengan filter jika ruangan dipilih
        $allDataBarang = Barang::when($ruanganId, function ($query) use ($ruanganId) {
            $query->where('ruangan', $ruanganId); // Filter barang berdasarkan ruangan
        })->get();

        return view('admin.kelola_data.barang.halaman_unduh', compact('ruangan', 'allDataBarang'));
    }

}

