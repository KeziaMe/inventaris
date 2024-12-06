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

    public function getDataBarang(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $dataBarang = Barang::whereMonth('tgl_update', $bulan)
            ->whereYear('tgl_update', $tahun)
            ->get()
            ->map(function ($barang) {
                // Format ulang tanggal sebelum dikirim ke frontend
                $barang->tgl_masuk = Carbon::parse($barang->tgl_masuk)->format('d-m-Y');
                $barang->tgl_update = Carbon::parse($barang->tgl_update)->format('d-m-Y');
                return $barang;
            });

        return response()->json($dataBarang);
    }


    public function unduhPerbulan(Request $request)
    {
        // Mengambil data bulan dan tahun yang ada barangnya (berdasarkan tgl_update) 
        $dataBarang = Barang::selectRaw('MONTH(tgl_update) as bulan, YEAR(tgl_update) as tahun')
            ->whereNotNull('tgl_update') // Memastikan tgl_update tidak null
            ->groupBy('bulan', 'tahun') // Pengelompokan berdasar bulan dan tahun
            ->orderBy('bulan') //Mengurutkan
            ->get();

        // Mengelompokkan data berdasarkan bulan
        $bulanDenganBarang = $dataBarang->groupBy('bulan')->map(function ($item) {
            return $item->pluck('tahun')->toArray();
        });

        // Mengirim variabel ke view
        return view("admin.kelola_data.barang.halaman_unduh_barang", compact('bulanDenganBarang'));
    }

    public function unduhPdf(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $namaBulan = Carbon::create()->month($bulan)->translatedFormat('F');

        // Ambil data barang
        $dataBarang = Barang::whereMonth('tgl_update', $bulan)
            ->whereYear('tgl_update', $tahun)
            ->get()
            ->map(function ($barang) {
                // Mengubah format tgl_masuk dan tgl_update menjadi objek Carbon
                $barang->tgl_masuk = Carbon::parse($barang->tgl_masuk);
                $barang->tgl_update = Carbon::parse($barang->tgl_update);
                return $barang;
            });

        if ($dataBarang->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data barang untuk bulan dan tahun yang dipilih.');
        }

        $pdf = PDF::loadView('admin.kelola_data.barang.unduh_barang', [
            'dataBarang' => $dataBarang,
            'bulan' => $namaBulan,
            'tahun' => $tahun
        ]);

        return $pdf->download("laporan_barang_{$bulan}_{$tahun}.pdf");
    }

    // Menampilkan grafik data barang perbulan
    public function showGrafikKondisi(Request $request)
    {
        // Mengatur supaya menggunakan bahasa Indonesia
        Carbon::setLocale('id');

        // Ambil tahun dari input, default ke tahun sekarang
        $selectedYear = $request->input('year', date('Y'));

        // Mengambil daftar tahun yang tersedia dari data barang
        $availableYears = Barang::selectRaw('YEAR(tgl_masuk) as tahun')
            ->distinct()
            ->orderBy('tahun', 'desc')
            ->pluck('tahun')
            ->toArray();

        // Mengambil data barang per bulan untuk kolom baik, kurang_baik, dan rusak_berat
        $barangPerBulan = Barang::selectRaw('
                MONTH(tgl_masuk) as bulan,
                SUM(baik) as total_baik,
                SUM(kurang_baik) as total_kurang_baik,
                SUM(rusak_berat) as total_rusak_berat
            ')
            ->whereYear('tgl_masuk', $selectedYear)
            ->groupBy('bulan')
            ->orderBy('bulan', 'asc')
            ->get();

        // Inisialisasi array untuk data grafik
        $dataGrafik = [];
        $bulanLabels = collect(range(1, 12))->map(function ($month) {
            // Ubah angka bulan menjadi nama bulan dalam bahasa Indonesia
            return Carbon::create()->month($month)->translatedFormat('F');
        })->toArray();

        // Loop untuk mengisi data grafik per bulan
        foreach (range(1, 12) as $bulan) {
            $barangBulan = $barangPerBulan->firstWhere('bulan', $bulan);
            $dataGrafik[] = [
                'bulan' => Carbon::create()->month($bulan)->translatedFormat('F'),
                'baik' => $barangBulan ? $barangBulan->total_baik : 0,
                'kurang_baik' => $barangBulan ? $barangBulan->total_kurang_baik : 0,
                'rusak_berat' => $barangBulan ? $barangBulan->total_rusak_berat : 0,
            ];
        }

        // Label kondisi untuk digunakan di view
        $kondisiLabels = ['Baik', 'Kurang Baik', 'Rusak Berat'];

        // Mengirimkan data ke view
        return view('admin.index', [
            'dataGrafik' => $dataGrafik,
            'bulanLabels' => $bulanLabels,
            'kondisiLabels' => $kondisiLabels,
            'selectedYear' => $selectedYear,
            'availableYears' => $availableYears, // Kirim daftar tahun yang tersedia
        ]);
    }

}