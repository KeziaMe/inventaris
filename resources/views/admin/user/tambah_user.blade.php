@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-6 my-4">
                <h2 class="page-title">Tambah Data User</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Data </strong>
                        </div>
                        <div class="card-body">
                            <form>
                                <div class="form-group row">
                                    <label for="textnama" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input type="text" name="textnama" class="form-control" id="textnama"
                                            placeholder="Masukkan Nama">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="custom-select" class="col-sm-3 col-form-label">Role</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" id="textrole" name="textrole">
                                            <option selected disabled>Pilih Role</option>
                                            <option value="kepala_sekolah"></option>
                                            <option value="admin"></option>
                                            <option value="sarpras"></option>
                                            <option value="bendahara"></option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-9">
                                        <input type="email" class="form-control" id="email" name="email"
                                            placeholder="Masukkan Email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="password" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="Masukkan Password">
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