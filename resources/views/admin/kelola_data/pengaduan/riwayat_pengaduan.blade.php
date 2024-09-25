@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Riwayat Pengaduan</h2>
                <div class="col text-end mb-2"> <!-- Mengurangi margin bawah di sini -->
                    <a href="{{route('pengaduan.view')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-door"></i>Kembali
                    </a>
                </div>

                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="mr-3">
                                        <strong>Total Barang Diperbaiki:</strong> {{ $totalPerbaikan }}
                                    </div>
                                    <div>
                                        <strong>Total Barang Selesai:</strong> {{ $totalSelesai }}
                                    </div>
                                </div>
                                <table class="table dataTables" id="dataTable-1">
                                    <thead>
                                        <tr>
                                            <th>NO</th>
                                            <th>Tanggal Pengaduan</th>
                                            <th>Keterangan</th>
                                            <th>Kondisi Barang</th>
                                            <th>Nama Status Pengaduan</th>
                                            <th>Tanggal Update</th>
                                            <th>Inventarisasi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- Data Riwayat Pengaduan -->
                                        @foreach ($allDataRiwayatPengaduan as $key => $pengaduan)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $pengaduan->tgl_pengaduan }}</td>
                                                <td>{{ $pengaduan->ket }}</td>
                                                <td>{{ $pengaduan->id_kondisi_brg }}</td>
                                                <td>{{ $pengaduan->nm_status_pengaduan }}</td>
                                                <td>{{ $pengaduan->tgl_update }}</td>
                                                <td>{{ $pengaduan->id_inventarisasi }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- simple table -->
                </div> <!-- end section -->
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection