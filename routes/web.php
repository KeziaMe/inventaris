<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KelolaData\RuanganController;
use App\Http\Controllers\KelolaData\BarangController;
use App\Http\Controllers\KelolaData\KondisiBarangController;
use App\Http\Controllers\KelolaData\JenisBarangController;
use App\Http\Controllers\KelolaData\PengaduanController;
use App\Http\Controllers\KelolaData\StatusPengaduanController;
use App\Http\Controllers\KelolaData\InventarisasiController;
use App\Http\Controllers\KelolaData\PenggunaController;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\upload\NotaController;
use App\Http\Controllers\Role\RoleController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    // Rute dashboard untuk mengarah ke BarangController showGrafik
    Route::get('/dashboard', [BarangController::class, 'showGrafik'])->name('dashboard');
});

Route::get('/admin/logout', [BerandaController::class, 'logout'])->name('admin.logout');


Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('ruangan')->group(function () {
        Route::get('/view', [RuanganController::class, 'ruanganView'])->name('ruangan.view');
        Route::get('/tambah', [RuanganController::class, 'ruanganTambah'])->name('ruangan.tambah');
        Route::get('/edit/{id}', [RuanganController::class, 'ruanganEdit'])->name('ruangan.edit');
        Route::post('/update/{id}', [RuanganController::class, 'ruanganUpdate'])->name('ruangan.update');
        Route::post('/store', [RuanganController::class, 'ruanganStore'])->name('ruangan.store');
        Route::get('/hapus/{id}', [RuanganController::class, 'ruanganHapus'])->name('ruangan.hapus');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('barang')->group(function () {
        Route::get('/view', [BarangController::class, 'barangView'])->name('barang.view');
        Route::get('/tambah', [BarangController::class, 'barangTambah'])->name('barang.tambah');
        Route::get('/viewriwayat', [BarangController::class, 'riwayatbarangView'])->name('barang.viewriwayat');
        Route::get('/edit{id}', [BarangController::class, 'barangEdit'])->name('barang.edit');
        Route::post('/update/{id}', [BarangController::class, 'barangUpdate'])->name('barang.update');
        Route::get('/unduh', [BarangController::class, 'barangUnduh'])->name('barang.unduh');
        Route::post('/store', [BarangController::class, 'barangStore'])->name('barang.store');
        Route::get('/hapus/{id}', [BarangController::class, 'barangHapus'])->name('barang.hapus');
        Route::get('/barang/unduh', [BarangController::class, 'unduhPdf'])->name('barang.unduh');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('kondisibarang')->group(function () {
        Route::get('/view', [KondisiBarangController::class, 'kondisibarangView'])->name('kondisibarang.view');
        Route::get('/tambah', [KondisiBarangController::class, 'kondisibarangTambah'])->name('kondisibarang.tambah');
        Route::get('/edit/{id}', [KondisiBarangController::class, 'kondisibarangEdit'])->name('kondisibarang.edit');
        Route::post('/store', [KondisiBarangController::class, 'kondisibarangStore'])->name('kondisibarang.store');
        Route::post('/update/{id}', [KondisiBarangController::class, 'kondisibarangUpdate'])->name('kondisibarang.update');
        Route::get('/hapus/{id}', [KondisiBarangController::class, 'kondisibarangHapus'])->name('kondisibarang.hapus');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('jenisbarang')->group(function () {
        Route::get('/view', [JenisBarangController::class, 'jenisbarangView'])->name('jenisbarang.view');
        Route::get('/tambah', [JenisBarangController::class, 'jenisbarangTambah'])->name('jenisbarang.tambah');
        Route::get('/edit/{id}', [JenisBarangController::class, 'jenisbarangEdit'])->name('jenisbarang.edit');
        Route::post('/store', [JenisBarangController::class, 'JenisbarangStore'])->name('jenisbarang.store');
        Route::post('/update/{id}', [JenisBarangController::class, 'JenisbarangUpdate'])->name('jenisbarang.update');
        Route::get('/hapus/{id}', [JenisBarangController::class, 'JenisbarangHapus'])->name('jenisbarang.hapus');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('pengaduan')->group(function () {
        Route::get('/pengaduan/view', [PengaduanController::class, 'pengaduanView'])->name('pengaduan.view');
        Route::get('/form_pengaduan', [PengaduanController::class, 'form_pengaduan'])->name('form_pengaduan');
        Route::get('/edit/{id}', [PengaduanController::class, 'pengaduanEdit'])->name('pengaduan.edit');
        Route::get('/detail/{id}', [PengaduanController::class, 'pengaduanDetail'])->name('pengaduan.detail');
        Route::get('/unduh', [PengaduanController::class, 'pengaduanUnduh'])->name('pengaduan.unduh');
        Route::post('/store', [PengaduanController::class, 'pengaduanStore'])->name('pengaduan.store');
        Route::post('/update/{id}', [PengaduanController::class, 'pengaduanUpdate'])->name('pengaduan.update');
        Route::get('/hapus/{id}', [PengaduanController::class, 'pengaduanHapus'])->name('pengaduan.hapus');
        Route::get('/pengaduan/unduh', [PengaduanController::class, 'unduhPdf'])->name('pengaduan.unduh');
        Route::get('/pengaduan/unduh-bulan', [PengaduanController::class, 'unduhPerbulan'])->name('pengaduan.unduhBulan');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('statuspengaduan')->group(function () {
        Route::get('/view', [StatusPengaduanController::class, 'statuspengaduanView'])->name('statuspengaduan.view');
        Route::post('/store', [StatusPengaduanController::class, 'statuspengaduanStore'])->name('statuspengaduan.store');
        Route::get('/tambah', [StatusPengaduanController::class, 'statuspengaduanTambah'])->name('statuspengaduan.tambah');
        Route::get('/edit/{id}', [StatusPengaduanController::class, 'statuspengaduanEdit'])->name('statuspengaduan.edit');
        Route::post('/update/{id}', [StatusPengaduanController::class, 'statuspengaduanUpdate'])->name('statuspengaduan.update');
        Route::get('/hapus/{id}', [StatusPengaduanController::class, 'statuspengaduanHapus'])->name('statuspengaduan.hapus');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('inventarisasi')->group(function () {
        Route::get('/view', [InventarisasiController::class, 'inventarisasiView'])->name('inventarisasi.view');
        Route::get('/Tambah', [InventarisasiController::class, 'inventarisasiTambah'])->name('inventarisasi.tambah');
        Route::post('/store', [InventarisasiController::class, 'inventarisasiStore'])->name('inventarisasi.store');
        Route::get('/Edit/{id}', [InventarisasiController::class, 'inventarisasiEdit'])->name('inventarisasi.edit');
        Route::post('/update/{id}', [InventarisasiController::class, 'inventarisasiUpdate'])->name('inventarisasi.update');
        Route::get('/hapus/{id}', [InventarisasiController::class, 'inventarisasiHapus'])->name('inventarisasi.hapus');
    });
});


// Semua route untuk user
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('role')->group(function () {
        Route::get('/view', [RoleController::class, 'roleView'])->name('role.view');
        Route::get('/Tambah', [RoleController::class, 'roleTambah'])->name('role.tambah');
        Route::get('/Edit/{id}', [RoleController::class, 'roleEdit'])->name('role.edit');
        Route::post('/Update/{id}', [RoleController::class, 'roleUpdate'])->name('role.update');
        Route::post('/store', [RoleController::class, 'roleStore'])->name('role.store');
        Route::get('/Hapus/{id}', [RoleController::class, 'roleHapus'])->name('role.hapus');
    });
});

// Semua route untuk user
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/view', [UserController::class, 'userView'])->name('user.view');
        Route::get('/Tambah', [UserController::class, 'userTambah'])->name('user.tambah');
        Route::post('/store', [UserController::class, 'userStore'])->name('user.store');
        Route::get('/Edit/{id}', [UserController::class, 'userEdit'])->name('user.edit');
        Route::post('/Update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
        Route::get('/Hapus/{id}', [UserController::class, 'userHapus'])->name('user.hapus');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('nota')->group(function () {
        Route::get('/upload', [NotaController::class, 'notaUpload'])->name('nota.upload');
        Route::get('/arsip', [NotaController::class, 'arsipNota'])->name('nota.arsip');
        Route::get('/detail/{id}', [NotaController::class, 'detailNota'])->name('nota.detail');
        Route::post('/store', [NotaController::class, 'notaStore'])->name('nota.store');
        Route::get('/hapus/{id}', [NotaController::class, 'hapusNota'])->name('nota.hapus');
    });
});


