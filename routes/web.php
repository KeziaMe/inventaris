<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\KelolaData\RuanganController;
use App\Http\Controllers\KelolaData\BarangController;
use App\Http\Controllers\KelolaData\JenisBarangController;
use App\Http\Controllers\KelolaData\PengaduanController;
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
    Route::get('/dashboard', function () {
        return view('admin.index');
    })->name('dashboard');
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
        Route::get('/edit{id}', [BarangController::class, 'barangEdit'])->name('barang.edit');
        Route::post('/update/{id}', [BarangController::class, 'barangUpdate'])->name('barang.update');
        Route::get('/unduh', [BarangController::class, 'barangUnduh'])->name('barang.unduh');
        Route::post('/store', [BarangController::class, 'barangStore'])->name('barang.store');
        Route::get('/hapus/{id}', [BarangController::class, 'barangHapus'])->name('barang.hapus');
    });
});


Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('jenisbarang')->group(function () {
        Route::get('/view', [JenisBarangController::class, 'jenisbarangView'])->name('jenisbarang.view');
        Route::get('/tambah', [JenisBarangController::class, 'jenisbarangTambah'])->name('jenisbarang.tambah');
        Route::get('/edit', [JenisBarangController::class, 'jenisbarangEdit'])->name('jenisbarang.edit');
        Route::post('/store', [JenisBarangController::class, 'JenisbarangStore'])->name('jenisbarang.store');
    });
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('pengaduan')->group(function () {
        Route::get('/view', [PengaduanController::class, 'pengaduanView'])->name('pengaduan.view');
        Route::get('/form_pengaduan', [PengaduanController::class, 'form_pengaduan'])->name('form_pengaduan');
        Route::get('/edit/{id}', [PengaduanController::class, 'pengaduanEdit'])->name('pengaduan.edit');
        Route::get('/detail/{id}', [PengaduanController::class, 'pengaduanDetail'])->name('pengaduan.detail');
        Route::get('/unduh', [PengaduanController::class, 'pengaduanUnduh'])->name('pengaduan.unduh');
        Route::post('/store', [PengaduanController::class, 'pengaduanStore'])->name('pengaduan.store');
        Route::post('/update/{id}', [PengaduanController::class, 'pengaduanUpdate'])->name('pengaduan.update');
        Route::get('/hapus/{id}', [PengaduanController::class, 'pengaduanHapus'])->name('pengaduan.hapus');
    });
});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/pengguna/view', [PenggunaController::class, 'penggunaView'])->name('pengguna.view');
});


// Semua route untuk user
Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('role')->group(function () {
        Route::get('/view', [RoleController::class, 'roleView'])->name('role.view');
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