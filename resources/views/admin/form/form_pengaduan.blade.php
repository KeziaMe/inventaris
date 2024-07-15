@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Form Pengaduan</h2>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Form</strong>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="example-date">Tanggal Pengaduan</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-fileinput">Foto</label>
                                    <input type="file" id="example-fileinput" class="form-control-file">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Keterangan</label>
                                    <input type="text" id="simpleinput" class="form-control">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="custom-select">Kondisi Barang</label>
                                    <select class="custom-select" id="custom-select">
                                        <option selected>Pilih Kondisi Barang</option>
                                        <option value="1">Kurang Baik</option>
                                        <option value="2">Rusak Berat</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="custom-select">Nama Status Pengaduan</label>
                                    <select class="custom-select" id="custom-select">
                                        <option selected>Pilih Nama Status Pengaduan</option>
                                        <option value="1">Perbaikan</option>
                                        <option value="2">Selesai</option>
                                    </select>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-date">Tanggal Masuk</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="example-date">Tanggal Update</label>
                                    <input class="form-control" id="example-date" type="date" name="date">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="simpleinput">Inventarisasi</label>
                                    <input type="text" id="simpleinput" class="form-control">
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
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>


</main>

@endsection