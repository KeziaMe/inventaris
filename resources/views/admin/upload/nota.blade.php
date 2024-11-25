@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-6 my-4">
                <h2 class="page-title">Tambah Data Nota</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>

                        <div class="card-body">
                            <!-- Ganti method dari form menjadi AJAX -->
                            <form id="notaForm" enctype="multipart/form-data">
                                @csrf

                                <div class="col-md-14">
                                    <div class="form-group mb-3">
                                        <label for="textTglNota">Tanggal Pengaduan</label>
                                        <input class="form-control" id="textTglNota" type="date" name="textTglNota">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textNota">Masukkan File</label>
                                        <input type="file" id="textNota" name="textNota" class="form-control-file">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textNota">Menampilkan</label>
                                        <!-- menambahkan kelas foto-preview pada gambar -->
                                        <img id="previewNota" src="#" alt="Menampilkan Nota" class="foto-preview">
                                    </div>

                                    <div class="form-group row">
                                        <label for="textKeterangan" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <input type="text" name="textKeterangan" class="form-control"
                                                id="textKeterangan" placeholder="Masukkan Keterangan">
                                        </div>
                                    </div>


                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                    <!-- Elemen untuk menampilkan pesan -->
                                    <div id="responseMessage" class="mt-3"></div>
                            </form>
                        </div>
                    </div>
</main> <!-- main -->

@endsection