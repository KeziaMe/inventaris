@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Unggah Nota</h2>
                <div class="row mb-4">
                    <div class="col-md-6">
                        <div class="card shadow mb-4">
                            <div class="card-header">
                                <strong>Nota</strong>
                            </div>
                            <div class="card-body">
                                <form method="post" action="{{ route('nota.store') }}" enctype="multipart/form-data"
                                    class="dropzone bg-light rounded-lg" id="tinydash-dropzone">
                                    @csrf

                                    <div class="dz-message needsclick">
                                        <div class="circle circle-lg bg-primary">
                                            <i class="fe fe-upload fe-24 text-white"></i>
                                        </div>
                                        <h5 class="text-muted mt-4">Letakkan file di sini atau klik untuk mengunggah
                                        </h5>
                                    </div>

                                    <input type="file" name="textNota" id="textNota" class="d-none">

                                    <div class="form-group mb-3">
                                        <label for="textKeterangan">Keterangan</label>
                                        <input type="text" name="textKeterangan" id="textKeterangan"
                                            class="form-control">
                                    </div>

                                    <div class="form-group mb-2 mt-4">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection