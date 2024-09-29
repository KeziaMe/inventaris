@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Ruangan</h2>
                <div class="col text-end mb-3"> <!-- ada jarak dengan tabel -->
                    <a href="{{route('ruangan.tambah')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-plus"></i>Tambah
                    </a>
                </div>

                <div class="col-md-10 my-4">
                    <div class="card shadow">
                        <div class="card-body">
                            <table class="table dataTables" id="dataTable-1">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Ruangan</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($allDataRuangan as $key => $ruangan)
                                        <tr>
                                            <td>{{$key + 1}}</td>
                                            <td>{{$ruangan->nm_ruangan}}</td>

                                            <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <span class="text-muted sr-only">Action</span>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <a class="dropdown-item"
                                                        href="{{route('ruangan.edit', $ruangan->id)}}">Edit</a>
                                                    <a class="dropdown-item" id="delete"
                                                        href="{{route('ruangan.hapus', $ruangan->id)}}">Hapus</a>
                                                </div>
                                            </td>
                                        </tr>

                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection