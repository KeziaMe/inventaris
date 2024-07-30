@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Tambah Data Inventarisasi</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('inventarisasi.store')}}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="textNamaRuangan" class="col-sm-3 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="textNamaRuangan"
                                            name="textNamaRuangan" placeholder="Masukkan Nama Ruangan">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textKodeBarang" class="col-sm-3 col-form-label">Kode Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="textKodeBarang"
                                            name="textKodeBarang" placeholder="Masukkan Kode Barang">
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="textTglInventaris" class="col-sm-3 col-form-label">Tanggal
                                        Inventaris</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="textTglInventaris" type="date"
                                            name="textTglInventaris">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textStatus" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" id="textStatus" name="textStatus"
                                            placeholder="Masukkan Nama Status">
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