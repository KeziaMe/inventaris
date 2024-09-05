@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Barang</h2>
                <div class="col text-end">

                    @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                        <a href="{{route('barang.tambah')}}" class="btn btn-success" style="color: white;">
                            <i class="fe fe-plus"></i>Tambah
                        </a>

                        <a href="{{route('unduh.perbulan')}}" class="btn btn-primary" style="color: white;">
                            <i class="fe fe-download"></i>Unduh

                        </a>
                        <a href="{{route('barang.viewriwayat')}}" class="btn btn-secondary" style="color: white;">
                            <i class="fe fe-repeat"></i>Riwayat
                        </a>
                    @endif

                    <!-- supaya muncul di role kepsek tanpa tambah -->
                    @if(auth()->user()->role == "Kepala Sekolah")
                        <a href="{{route('unduh.perbulan')}}" class="btn btn-primary" style="color: white;">
                            <i class="fe fe-download"></i>Unduh

                        </a>
                        <a href="{{route('barang.viewriwayat')}}" class="btn btn-secondary" style="color: white;">
                            <i class="fe fe-repeat"></i>Riwayat
                        </a>
                    @endif

                </div>


                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <table class="table dataTables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Kondisi Barang</th>
                                            <th>Keterangan</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Update</th>
                                            <th>Jenis Barang</th>
                                            @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                                                <th>Aksi</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allDataBarang as $key => $barang)
                                            <tr>
                                                <td>{{$key + 1}}</td>
                                                <td>{{$barang->kd_brg}}</td>
                                                <td>{{$barang->nm_brg}}</td>
                                                <td>{{ $barang->kondisi_brg }}</td>
                                                <td>{{$barang->ket}}</td>
                                                <td>{{$barang->tgl_masuk}}</td>
                                                <td>{{$barang->tgl_update}}</td>
                                                <td>{{$barang->jenis_brg}}</td>

                                                @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                                                    <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>

                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{route('barang.edit', $barang->id)}}">Edit</a>
                                                            <a class="dropdown-item" id="delete"
                                                                href="{{route('barang.hapus', $barang->id)}}">Hapus</a>
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