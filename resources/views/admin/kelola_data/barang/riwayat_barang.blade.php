@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Riwayat Barang</h2>
                <div class="col text-end">
                    <a href="{{route('barang.view')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-door"></i>Kembali
                    </a>
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
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($allDataRiwayatBarang as $key => $barang)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $barang->kd_brg }}</td>
                                                <td>{{ $barang->nm_brg }}</td>
                                                <td>{{ $barang->kondisi_brg }}</td>
                                                <td>{{ $barang->ket }}</td>
                                                <td>{{ $barang->tgl_masuk }}</td>
                                                <td>{{ $barang->tgl_update }}</td>
                                                <td>{{ $barang->jenis_brg }}</td>
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