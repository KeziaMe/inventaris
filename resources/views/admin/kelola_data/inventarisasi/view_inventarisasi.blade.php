@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Inventarisasi</h2>
                <div class="col text-end">
                    <a href="{{route('inventarisasi.tambah')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-plus"></i>Tambah
                    </a>
                </div>
                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-10 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table dataTables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nama Ruangan</th>
                                            <th>Kode Barang</th>
                                            <th>Tanggal Inventaris</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allDataInventarisasi as $key => $inventarisasi)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$inventarisasi->nm_ruangan}}</td>
                                                <td>{{$inventarisasi->kd_brg}}</td>
                                                <td>{{ \Carbon\Carbon::parse($inventarisasi->tgl_inventaris)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{$inventarisasi->status}}</td>

                                                <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <span class="text-muted sr-only">Action</span>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a class="dropdown-item"
                                                            href="{{route('inventarisasi.edit', $inventarisasi->id)}}">Ubah</a>
                                                        <a class="dropdown-item" id="delete"
                                                            href="{{route('inventarisasi.hapus', $inventarisasi->id)}}">Hapus</a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


</main>

@endsection