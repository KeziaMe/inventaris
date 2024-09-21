@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Pengaduan</h2>
                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Kepala Sekolah")
                    <div class="col text-end">
                        <a href="{{route('pengaduan.unduhBulan')}}" class="btn btn-primary" style="color: white;">
                            <i class="fe fe-download"></i>Unduh
                        </a>
                        <a href="{{route('pengaduan.riwayat')}}" class="btn btn-secondary" style="color: white;">
                            <i class="fe fe-repeat"></i>Riwayat
                        </a>
                    </div>
                @endif

                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-13 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table dataTables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Kondisi Barang</th>
                                            <th>Nama Status Pengaduan</th>
                                            <th>Tanggal Update</th>
                                            <th>Inventarisasi</th>

                                            @if (auth()->user()->role == "Admin" || auth()->user()->role == "Kepala Sekolah" || auth()->user()->role == "SARPRAS")
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allDataPengaduan as $key => $pengaduan)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$pengaduan->tgl_pengaduan}}</td>
                                                <td>{{$pengaduan->id_kondisi_brg}}</td>
                                                <td>{{$pengaduan->nm_status_pengaduan}}</td>
                                                <td>{{$pengaduan->tgl_update}}</td>
                                                <td>{{$pengaduan->id_inventarisasi}}</td>

                                                @if (auth()->user()->role == "Admin" || auth()->user()->role == "Kepala Sekolah" || auth()->user()->role == "SARPRAS")
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            @if (auth()->user()->role == "Admin")
                                                                <a class="dropdown-item"
                                                                    href="{{route('pengaduan.detail', $pengaduan->id)}}">Detail</a>
                                                                <a class="dropdown-item"
                                                                    href="{{route('pengaduan.edit', $pengaduan->id)}}">Edit</a>
                                                                <a class="dropdown-item" id="delete"
                                                                    href="{{route('pengaduan.hapus', $pengaduan->id)}}">Hapus</a>
                                                            @endif
                                                            @if (auth()->user()->role == "Kepala Sekolah" || auth()->user()->role == "SARPRAS")
                                                                <a class="dropdown-item"
                                                                    href="{{route('pengaduan.detail', $pengaduan->id)}}">Detail</a>
                                                            @endif
                                                        </div>
                                                    </td>
                                                @endif


                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                    <!-- Bordered table -->

                </div> <!-- end section -->

            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

</main> <!-- main -->

@endsection