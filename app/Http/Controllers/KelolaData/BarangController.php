<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\RiwayatBarang;
use Carbon\Carbon; //untuk manipulasi tanggal
use PDF;

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
        $validateData = $request->validate([
            'textKodebrg' => 'required',

        ]);

        // Simpan data barang baru
        $data = new Barang();
        $data->kd_brg = $request->textKodebrg;
        $data->nm_brg = $request->textNmbrg;
        $data->kondisi_brg = $request->textKondisibrg;
        $data->ket = $request->textKet;
        $data->tgl_masuk = $request->textTglmasuk;
        $data->tgl_update = $request->textTglUpdate;
        $data->jenis_brg = $request->textJenisBrg;
        $data->save();

        // Simpan data barang baru ke tabel RiwayatBarang
        $riwayat = new RiwayatBarang();
        $riwayat->kd_brg = $data->kd_brg;
        $riwayat->nm_brg = $data->nm_brg;
        $riwayat->kondisi_brg = $data->kondisi_brg;
        $riwayat->ket = $data->ket;
        $riwayat->tgl_masuk = $data->tgl_masuk;
        $riwayat->tgl_update = $data->tgl_update;
        $riwayat->jenis_brg = $data->jenis_brg;
        $riwayat->save();

        return redirect()->route('barang.view');
    }

    public function barangUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'textKodebrg' => 'required',
            // Tambahkan validasi untuk field lainnya sesuai kebutuhan
        ]);

        // Ambil data barang yang lama
        $dataLama = Barang::find($id);

        // Simpan data lama ke tabel RiwayatBarang sebagai entri baru
        $riwayat = new RiwayatBarang();
        $riwayat->kd_brg = $dataLama->kd_brg;
        $riwayat->nm_brg = $dataLama->nm_brg;
        $riwayat->kondisi_brg = $dataLama->kondisi_brg;
        $riwayat->ket = $dataLama->ket;
        $riwayat->tgl_masuk = $dataLama->tgl_masuk;
        $riwayat->tgl_update = $dataLama->tgl_update;
        $riwayat->jenis_brg = $dataLama->jenis_brg;
        $riwayat->save();

        // Update data baru di tabel Barang
        $dataLama->kd_brg = $request->textKodebrg;
        $dataLama->nm_brg = $request->textNmbrg;
        $dataLama->kondisi_brg = $request->textKondisibrg;
        $dataLama->ket = $request->textKet;
        $dataLama->tgl_masuk = $request->textTglmasuk;
        $dataLama->tgl_update = $request->textTglUpdate;
        $dataLama->jenis_brg = $request->textJenisBrg;
        $dataLama->save();

        return redirect()->route('barang.view');
    }

    public function barangHapus($id)
    {
        $hapusDataBarang = Barang::find($id);
        $hapusDataBarang->delete();

        return redirect()->route('barang.view');
    }

    public function unduhPdf()
    {
        $allDataBarang = Barang::all(); // Ambil data barang dari database

        // Memuat view dengan data yang diperlukan
        $pdf = PDF::loadView('admin.kelola_data.barang.unduh_barang', compact('allDataBarang'));

        // Mengunduh PDF dengan nama file tertentu
        return $pdf->download('laporan_barang.pdf');
    }

    // Menampilkan grafik data barang perbulan
    public function showGrafikKondisi()
    {
        // Mengatur supaya menggunakan bahasa Indonesia
        Carbon::setLocale('id');

        // Mengambil data barang berdasar bulan dan kondisi
        $barangPerKondisiDanBulan = Barang::selectRaw('MONTH(tgl_masuk) as bulan, kondisi_brg as kondisi, COUNT(*) as jumlah')
            ->groupBy('bulan', 'kondisi')
            ->orderBy('bulan', 'asc')
            ->get();

        // Inisialisasi array untuk setiap kondisi perbulan
        $dataGrafik = [];
        $kondisiLabels = ['Baik', 'Kurang Baik', 'Rusak Berat'];
        $bulanLabels = collect(range(1, 12))->map(function ($month) {
            // agar menjadi nama bulan dalam bahasa Indonesia
            return Carbon::create()->month($month)->translatedFormat('F');
        });

        // Loop untuk mengisi data grafik
        foreach ($bulanLabels as $bulan) {
            $data = [
                'bulan' => $bulan,
                'baik' => 0,
                'kurang_baik' => 0,
                'rusak_berat' => 0,
            ];

            foreach ($barangPerKondisiDanBulan as $barang) {
                if (Carbon::create()->month($barang->bulan)->translatedFormat('F') == $bulan) {
                    if (strtolower($barang->kondisi) == 'baik') {
                        $data['baik'] = $barang->jumlah;
                    } elseif (strtolower($barang->kondisi) == 'kurang baik') {
                        $data['kurang_baik'] = $barang->jumlah;
                    } elseif (strtolower($barang->kondisi) == 'rusak berat') {
                        $data['rusak_berat'] = $barang->jumlah;
                    }
                }
            }
            $dataGrafik[] = $data;
        }

        return view('admin.index', compact('dataGrafik', 'bulanLabels', 'kondisiLabels'));
    }
}
