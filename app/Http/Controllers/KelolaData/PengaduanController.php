<?php

namespace App\Http\Controllers\KelolaData;

use App\Http\Controllers\Controller;
use App\Models\StatusPengaduan;
use Illuminate\Http\Request;
use App\Models\Pengaduan;
use App\Models\Barang;
use App\Models\Inventarisasi;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use DB; // Tambahkan ini untuk menggunakan DB facade

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
        $inventarisasi = Inventarisasi::all();
        return view("admin.form.form_pengaduan", compact('inventarisasi'));
    }

    public function pengaduanEdit($id)
    {
        $pengaduan = StatusPengaduan::all();
        $editDataPengaduan = Pengaduan::find($id);
        return view("admin.kelola_data.pengaduan.edit_pengaduan", compact('editDataPengaduan', 'pengaduan'));
    }

    public function pengaduanDetail($id)
    {
        $detailData_pengaduan = Pengaduan::find($id);
        return view("admin.kelola_data.pengaduan.detail_pengaduan", compact('detailData_pengaduan'));
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
        $data->tgl_update = $request->textTgl_update;
        $data->id_inventarisasi = $request->textInventarisasi;
        $data->save();

        return redirect()->route('pengaduan.view');
    }

    public function pengaduanUpdate(Request $request, $id)
    {
        $validateData = $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // menambahkan validasi untuk file image
            'textStatus' => 'required',
            'textKondisi_brg' => 'required',

        ]);

        $data = Pengaduan::find($id);
        $data->tgl_pengaduan = $request->textTglPengaduan;
        if ($request->file('foto')) {
            // Delete the old photo if exists
            if ($data->foto && Storage::disk('public')->exists($data->foto)) {
                Storage::disk('public')->delete($data->foto);
            }

            // Store the new photo
            $foto = $request->file('foto')->store('gambar_pengaduan/foto', 'public');
            $data->foto = $foto;
        }

        $data->ket = $request->textKeterangan;
        $data->id_kondisi_brg = $request->textKondisi_brg;
        $data->tgl_update = $request->textTgl_update;
        $data->id_inventarisasi = $request->textInventarisasi;
        $data->nm_status_pengaduan = $request->textStatus;
        $data->save();

        \Log::info('Redirecting to pengaduan.view');

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

    public function unduhPerbulan(Request $request)
    {
        // Mengambil daftar bulan dan tahun yang memiliki data pengaduan
        $dataPengaduan = Pengaduan::selectRaw('MONTH(tgl_pengaduan) as bulan, YEAR(tgl_pengaduan) as tahun')
            ->distinct()
            ->get();

        // Mengelompokkan data berdasarkan bulan
        $bulanDenganPengaduan = $dataPengaduan->groupBy('bulan')->map(function ($item) {
            return $item->pluck('tahun')->toArray();
        });

        // Mengirim variabel ke view
        return view("admin.kelola_data.pengaduan.halaman_unduh_pengaduan", compact('bulanDenganPengaduan'));
    }

    public function unduhPerbulanPDF(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        // Ubah angka bulan menjadi nama bulan dalam bahasa Indonesia
        $namaBulan = Carbon::create()->month($bulan)->translatedFormat('F');

        $dataPengaduan = Pengaduan::whereMonth('tgl_pengaduan', $bulan)
            ->whereYear('tgl_pengaduan', $tahun)
            ->get();

        if ($dataPengaduan->isEmpty()) {
            return redirect()->back()->with('error', 'Tidak ada data pengaduan untuk bulan dan tahun yang dipilih.');
        }

        $pdf = PDF::loadView('admin.kelola_data.pengaduan.unduh_pengaduan', [
            'allDataPengaduan' => $dataPengaduan,
            'bulan' => $namaBulan,  // Kirim nama bulan yang sudah diubah
            'tahun' => $tahun
        ]);

        return $pdf->download("laporan_pengaduan_{$bulan}_{$tahun}.pdf");
    }

    public function getDataPengaduan(Request $request)
    {
        $bulan = $request->input('bulan');
        $tahun = $request->input('tahun');

        $dataPengaduan = Pengaduan::whereMonth('tgl_pengaduan', $bulan)
            ->whereYear('tgl_pengaduan', $tahun)
            ->with('StatusPengaduan') // Pastikan untuk mengambil relasi
            ->get()
            ->map(function ($pengaduan) {
                // Format ulang tanggal sebelum dikirim ke frontend
                $pengaduan->tgl_pengaduan = Carbon::parse($pengaduan->tgl_pengaduan)->format('d-m-Y');
                $pengaduan->tgl_update = Carbon::parse($pengaduan->tgl_update)->format('d-m-Y');
                return $pengaduan;
            });

        return response()->json($dataPengaduan);
    }

    public function riwayatPengaduan()
    {
        // Mengambil semua data riwayat pengaduan dari tabel pengaduans
        $allDataRiwayatPengaduan = DB::table('pengaduans')->get();

        // Menghitung total jumlah perbaikan (misalnya kondisi 'Perbaikan')
        $totalPerbaikan = $allDataRiwayatPengaduan->where('nm_status_pengaduan', 'Perbaikan')->count();

        // Menghitung total jumlah barang yang selesai (misalnya kondisi 'Selesai')
        $totalSelesai = $allDataRiwayatPengaduan->where('nm_status_pengaduan', 'Selesai')->count();

        // Mengirim data ke view
        return view('admin.kelola_data.pengaduan.riwayat_pengaduan', compact('allDataRiwayatPengaduan', 'totalPerbaikan', 'totalSelesai'));
    }



}
