@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Tambah Jenis Barang</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Tambah Jenis Barang </strong>
                        </div>
                        <div class="card-body">
                            <form>

                                <div class="form-group row align-items-center">
                                    <label for="custom-select" class="col-sm-3 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" id="custom-select">
                                            <option selected disabled>Pilih Jenis Barang</option>
                                            <option value="1">Alat Elekronik</option>
                                            <option value="2">Mebel</option>
                                            <option value="3">Alat Masak</option>
                                            <option value="4">Alat Kebersihan</option>
                                            <option value="5">Alat Pembelajaran</option>
                                            <option value="6">Peralatan Olahraga</option>
                                            <option value="7">Peralatan UKS</option>
                                            <option value="8">Penghargaan</option>
                                            <option value="9">Peralatan Lab.IPA</option>
                                            <option value="10">Buku</option>
                                        </select>
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