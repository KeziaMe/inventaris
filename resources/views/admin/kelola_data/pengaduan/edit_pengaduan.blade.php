@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Edit Data Pengaduan</h2>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Edit Data</strong>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('pengaduan.update', $editDataPengaduan->id)}}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="textTglPengaduan">Tanggal Pengaduan</label>
                                        <input class="form-control" id="textTglPengaduan" type="date"
                                            name="textTglPengaduan" value="{{$editDataPengaduan->tgl_pengaduan}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="foto">Foto</label>
                                        <input type="file" id="foto" class="form-control-file" name="foto"
                                            value="{{$editDataPengaduan->foto}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="foto">preview</label>
                                        <!-- menambahkan foto-preview -->
                                        <img id="previewFoto" src="{{asset('storage/' . $editDataPengaduan->foto)}}"
                                            alt="Preview Foto" class="foto-preview">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKeterangan">Keterangan</label>
                                        <input type="text" id="textKeterangan" name="textKeterangan"
                                            class="form-control" placeholder="Wajib diisi"
                                            value="{{$editDataPengaduan->ket}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKondisi_brg">Kondisi Barang</label>
                                        <select class="custom-select" id="textKondisi_brg" name="textKondisi_brg">
                                            <option disabled selected>Pilih Kondisi Barang</option>
                                            <option value="Baik" {{($editDataPengaduan->id_kondisi_brg == "Baik" ? "selected" : "")}}>Baik</option>
                                            <option value="Kurang Baik" {{($editDataPengaduan->id_kondisi_brg == "Kurang Baik" ? "selected" : "")}}>Kurang Baik</option>
                                            <option value="Rusak Berat" {{($editDataPengaduan->id_kondisi_brg == "Rusak Berat" ? "selected" : "")}}>Rusak Berat</option>
                                        </select>
                                    </div>


                                    <div class="form-group row align-items-center">
                                        <label for="textStatus" class="col-sm-3 col-form-label">Nama Status
                                            Pengaduan</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select" name="textStatus" id="textStatus">
                                                <option selected disabled>Pilih Status Pengaduan</option>
                                                <option value="Perbaikan"
                                                    {{($editDataPengaduan->nm_status_pengaduan == "Perbaikan" ? "selected" : "")}}>Perbaikan</option>
                                                <option value="Selesai"
                                                    {{($editDataPengaduan->nm_status_pengaduan == "Selesai" ? "selected" : "")}}>Selesai</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="text_tgl_masuk">Tanggal Masuk</label>
                                        <input class="form-control" id="text_tgl_masuk" type="date"
                                            name="text_tgl_masuk" value="{{$editDataPengaduan->tgl_masuk}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textTgl_update">Tanggal Update</label>
                                        <input class="form-control" id="textTgl_update" type="date"
                                            name="textTgl_update" value="{{$editDataPengaduan->tgl_update}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textInventarisasi">Inventarisasi</label>
                                        <input type="text" id="textInventarisasi" class="form-control"
                                            name="textInventarisasi" value="{{$editDataPengaduan->id_inventarisasi}}">
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection