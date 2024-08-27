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
                        <form method="post" action="{{route('pengaduan.store')}}" enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="textTglPengaduan">Tanggal Pengaduan</label>
                                        <input class="form-control" id="textTglPengaduan" type="date"
                                            name="textTglPengaduan">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="foto">Foto</label>
                                        <input type="file" id="foto" class="form-control-file" name="foto">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="foto">preview</label>
                                        <!-- menambahkan kelas foto-preview pada gambar -->
                                        <img id="previewFoto" src="#" alt="Preview Foto" class="foto-preview">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKeterangan">Keterangan</label>
                                        <input type="text" id="textKeterangan" name="textKeterangan"
                                            class="form-control" placeholder="Wajib diisi">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKondisi_brg">Kondisi Barang</label>
                                        <select class="custom-select" id="textKondisi_brg" name="textKondisi_brg">
                                            <option disabled selected>Pilih Kondisi Barang</option>
                                            <option value="Kurang Baik">Kurang Baik</option>
                                            <option value="Rusak Berat">Rusak Berat</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="text_tgl_masuk">Tanggal Masuk</label>
                                        <input class="form-control" id="text_tgl_masuk" type="date"
                                            name="text_tgl_masuk">
                                    </div>


                                    <div class="form-group mb-3">
                                        <label for="textInventarisasi">Inventarisasi</label>
                                        <input type="text" id="textInventarisasi" class="form-control"
                                            name="textInventarisasi">
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