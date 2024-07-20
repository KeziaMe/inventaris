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
                            <form method="post" action="{{route('nota.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label for="textNota">Masukkan File</label>
                                    <input type="file" id="textNota" name="textNota" class="form-control-file">
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
                            </form>
                        </div>
                    </div>
</main> <!-- main -->


@endsection