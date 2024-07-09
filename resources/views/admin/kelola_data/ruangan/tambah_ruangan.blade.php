@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-8 my-4">
                <h2 class="page-title">Tambah Data Ruangan</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="inputEmail3"
                                            placeholder="Masukkan Nama Ruangan">
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