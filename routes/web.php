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


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/ruangan/view', [RuanganController::class, 'ruanganView'])->name('ruangan.view');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/ruangan/tambah', [RuanganController::class, 'ruanganTambah'])->name('ruangan.tambah');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/ruangan/edit', [RuanganController::class, 'ruanganEdit'])->name('ruangan.edit');
});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/barang/view', [BarangController::class, 'barangView'])->name('barang.view');

    Route::get('/kelola_data/barang/tambah', [BarangController::class, 'barangTambah'])->name('barang.tambah');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/barang/edit', [BarangController::class, 'barangEdit'])->name('barang.edit');

});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/barang/unduh', [BarangController::class, 'barangUnduh'])->name('barang.unduh');

});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/jenisbarang/view', [JenisBarangController::class, 'jenisbarangView'])->name('jenisbarang.view');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/jenisbarang/tambah', [JenisBarangController::class, 'jenisbarangTambah'])->name('jenisbarang.tambah');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/jenisbarang/edit', [JenisBarangController::class, 'jenisbarangEdit'])->name('jenisbarang.edit');
});


Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/pengaduan/view', [PengaduanController::class, 'pengaduanView'])->name('pengaduan.view');
    Route::get('/form/form_pengaduan', [PengaduanController::class, 'form_pengaduan'])->name('form_pengaduan');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/pengaduan/edit', [PengaduanController::class, 'pengaduanEdit'])->name('pengaduan.edit');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/pengaduan/detail', [PengaduanController::class, 'pengaduanDetail'])->name('pengaduan.detail');
});
Route::middleware('auth', 'verified')->group(function () {
    Route::get('/kelola_data/pengaduan/unduh', [PengaduanController::class, 'pengaduanUnduh'])->name('pengaduan.unduh');
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