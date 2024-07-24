@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Edit Jenis Barang</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('jenisbarang.update', $editDataJenisBarang->id)}}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="textJenisBarang" class="col-sm-3 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-9">
                                        <input type="textJenisBarang" class="form-control" id="textJenisBarang"
                                            name="textJenisBarang" placeholder="Masukkan Nama Jenis Barang"
                                            value="{{$editDataJenisBarang->jns_brg}}">
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