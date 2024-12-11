<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use App\Models\KondisiBarang;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\RiwayatBarang;
use App\Models\JenisBarang;
use App\Models\Pengaduan;
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
        return view("admin.kelola_data.barang.tambah_barang", compact('jenis_barang'));
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
        return view("admin.kelola_data.barang.edit_barang", compact('editDataBarang', 'jenis_barang'));
    }

    public function riwayatbarangView()
    {
        $data['allDataRiwayatBarang'] = RiwayatBarang::orderBy('tgl_update', 'desc')->get();
        return view("admin.kelola_data.barang.riwayat_barang", $data);
    }

    public function barangUnduh()
    {
        return view("admin.kelola_data.barang.unduh_barang");
    }

    public function barangStore(Request $request)
    {
        // Validasi input
        $validateData = $request->validate([
            'textKodebrg' => 'required',
            'textNmbrg' => 'required',
            'textBrgBaik' => 'required|integer',
            'textBrgKurangBaik' => 'required|integer',
            'textBrgRusakBerat' => 'required|integer',
            'textJenisBrg' => 'required',
            'textKet' => 'nullable|string', // Pastikan keterangan bisa kosong
        ]);

        // Menghitung jumlah total berdasarkan kondisi barang
        $jumlah = $request->textBrgBaik + $request->textBrgKurangBaik + $request->textBrgRusakBerat;

        // Simpan data barang baru
        $data = new Barang();
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->baik = $request->textBrgBaik;
        $data->kurang_baik = $request->textBrgKurangBaik;
        $data->rusak_berat = $request->textBrgRusakBerat;
        $data->jumlah = $jumlah; // Menyimpan jumlah yang dihitung
        $data->ket = $request->textKet;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        return redirect()->route('barang.view')->with('success', 'Data barang berhasil disimpan.');
    }

    public function barangUpdate(Request $request, $id)
    {
        // Validasi input
        $validateData = $request->validate([
            'textKodebrg' => 'required',
            'textNmbrg' => 'required',
            'textBrgBaik' => 'required|integer',
            'textBrgKurangBaik' => 'required|integer',
            'textBrgRusakBerat' => 'required|integer',
            'textJenisBrg' => 'required',
            'textKet' => 'nullable|string', // Keterangan bisa kosong
        ]);

        // Ambil data barang yang lama
        $data = Barang::find($id);

        // Pastikan barang ditemukan
        if (!$data) {
            return redirect()->route('barang.view')->with('error', 'Barang tidak ditemukan.');
        }

        // Menghitung jumlah total berdasarkan kondisi barang yang baru
        $jumlah = $request->textBrgBaik + $request->textBrgKurangBaik + $request->textBrgRusakBerat;

        // Update data barang
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->baik = $request->textBrgBaik;
        $data->kurang_baik = $request->textBrgKurangBaik;
        $data->rusak_berat = $request->textBrgRusakBerat;
        $data->jumlah = $jumlah;  // Update jumlah berdasarkan perhitungan baru
        $data->ket = $request->textKet;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        return redirect()->route('barang.view')->with('success', 'Data barang berhasil diperbarui.');
    }

    public function barangHapus($id)
    {
        $hapusDataBarang = Barang::find($id);
        $hapusDataBarang->delete();

        return redirect()->route('barang.view');
    }
}