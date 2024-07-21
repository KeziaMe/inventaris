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
                                        <label for="textKeterangan">Keterangan</label>
                                        <input type="text" id="textKeterangan" name="textKeterangan"
                                            class="form-control" placeholder="Wajib diisi"
                                            value="{{$editDataPengaduan->ket}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKondisi_brg">Kondisi Barang</label>
                                        <select class="custom-select" id="textKondisi_brg" name="textKondisi_brg">
                                            <option disabled selected>Pilih Kondisi Barang</option>
                                            <option value="Kurang Baik" {{($editDataPengaduan->id_kondisi_brg == "kurang baik" ? "selected" : "")}}>Kurang Baik</option>
                                            <option value="Rusak Berat" {{($editDataPengaduan->id_kondisi_brg == "rusak berat" ? "selected" : "")}}>Rusak Berat</option>
                                        </select>
                                    </div>

                                    <div class="form-group row">
                                        <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Status
                                            Pengaduan</label>
                                        <div class="col-sm-9">
                                            <input type="email" class="form-control" id="inputEmail3"
                                                placeholder="Nama Status Pengaduan"
                                                {{$editDataPengaduan->nm_status_pengaduan}}>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="text_tgl_masuk">Tanggal Masuk</label>
                                        <input class="form-control" id="text_tgl_masuk" type="date"
                                            name="text_tgl_masuk" {{$editDataPengaduan->tgl_masuk}}>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textTgl_update">Tanggal Update</label>
                                        <input class="form-control" id="textTgl_update" type="date"
                                            name="textTgl_update" {{$editDataPengaduan->tgl_update}}>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textInventarisai">Inventarisasi</label>
                                        <input type="text" id="textInventarisai" class="form-control"
                                            name="textInventarisai" {{$editDataPengaduan->id_inventarisasi}}>
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                </div>

                                <div class="modal fade modal-shortcut modal-slide" tabindex="-1" role="dialog"
                                    aria-labelledby="defaultModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="defaultModalLabel">Shortcuts</h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                        </div>
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