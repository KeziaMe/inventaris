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
        // Ambil bulan dan tahun yang unik dari tgl_update
        $bulanTahun = DB::table('barangs')
            ->select(DB::raw('DISTINCT YEAR(tgl_update) as tahun, MONTH(tgl_update) as bulan'))
            ->orderBy('tahun', 'desc')
            ->get();

        // Ambil data barang dengan query dasar
        $query = Barang::query();

        // Filter berdasarkan bulan dan tahun jika ada input
        if ($request->has('bulan') && $request->bulan != '') {
            $query->whereMonth('tgl_update', $request->bulan);
        }

        if ($request->has('tahun') && $request->tahun != '') {
            $query->whereYear('tgl_update', $request->tahun);
        }

        // Filter berdasarkan kondisi barang jika ada input
        if ($request->has('kondisi') && $request->kondisi != '') {
            if ($request->kondisi === 'Baik') {
                $query->where('baik', true);
            } elseif ($request->kondisi === 'Kurang Baik') {
                $query->where('kurang_baik', true);
            } elseif ($request->kondisi === 'Rusak Berat') {
                $query->where('rusak_berat', true);
            }
        }

        // Ambil data barang yang sudah difilter
        $data['allDataBarang'] = $query->get()->map(function ($barang) {
            $barang->tgl_masuk = Carbon::parse($barang->tgl_masuk)->format('Y-m-d');
            $barang->tgl_update = Carbon::parse($barang->tgl_update)->format('Y-m-d');
            return $barang;
        });

        // Hitung total barang berdasarkan kondisi
        $data['totalBaik'] = Barang::where('baik', true)->count();
        $data['totalKurangBaik'] = Barang::where('kurang_baik', true)->count();
        $data['totalRusakBerat'] = Barang::where('rusak_berat', true)->count();

        // Kirim data bulan, tahun, dan kondisi barang untuk filter ke view
        $data['bulanTahun'] = $bulanTahun;
        $data['kondisiBarang'] = ['Baik', 'Kurang Baik', 'Rusak Berat'];

        // Tambahkan nilai yang dipilih ke view
        $data['selectedBulan'] = $request->bulan;
        $data['selectedTahun'] = $request->tahun;
        $data['selectedKondisi'] = $request->kondisi;

        return view("admin.kelola_data.barang.view_barang", $data);
    }

    public function barangTambah()
    {
        $kondisi_barang = KondisiBarang::all();
        $jenis_barang = JenisBarang::all();
        return view("admin.kelola_data.barang.tambah_barang", compact('kondisi_barang', 'jenis_barang'));
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
        $kondisi_barang = KondisiBarang::all();
        $jenis_barang = JenisBarang::all();
        $editDataBarang = Barang::find($id);
        return view("admin.kelola_data.barang.edit_barang", compact('editDataBarang', 'kondisi_barang', 'jenis_barang'));
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