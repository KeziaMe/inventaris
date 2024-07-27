@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-8 my-4">
                <h2 class="page-title">Tambah Data Status Pengaduan</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>
                        <div class="card-body">
                            <!-- <form method="post" action="{{route('statuspengaduan.store')}}"
                                enctype="multipart/form-data">
                                @csrf -->

                            <div class="form-group row">
                                <label for="textNamaStatusPengaduan" class="col-sm-3 col-form-label">Nama Status
                                    Pengaduan</label>
                                <div class="col-sm-9">
                                    <input type="textNamaStatusPengaduan" class="form-control"
                                        id="textNamaStatusPengaduan" name="textNamaStatusPengaduan"
                                        placeholder="Masukkan Nama Status Pengaduan">
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