@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Kondisi Barang</h2>
                <div class="col text-end">
                    <a href="{{route('jenisbarang.tambah')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-plus"></i>Tambah
                    </a>
                </div>

                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-6 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Kondisi Barang</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td></td>
                                            <td>ini kondisi</td>

                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item" href="#">Edit</a>
                                                    <a class="dropdown-item" id="delete" href="#">Hapus</a>
                                                </div>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->

</main> <!-- main -->
@endsection