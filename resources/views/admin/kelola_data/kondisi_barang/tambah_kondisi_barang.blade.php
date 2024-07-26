@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Tambah Kondisi Barang</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('kondisibarang.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="textKondisibarang" class="col-sm-3 col-form-label">Kondisi
                                        Barang</label>
                                    <div class="col-sm-9">
                                        <input type="textKondisibarang" class="form-control" id="textKondisibarang"
                                            name="textKondisibarang" placeholder="Masukkan Nama Kondisi Barang">
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>

                        </div>
                    </div>
</main> <!-- main -->

@endsection