@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Barang</h2>
                <div class="col text-end mb-3"> <!-- Menambahkan margin bawah pada kolom tombol "Tambah" -->
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

                    @if(auth()->user()->role == "Kepala Sekolah")
                        <a href="{{route('unduh.perbulan')}}" class="btn btn-primary" style="color: white;">
                            <i class="fe fe-download"></i>Unduh
                        </a>
                        <a href="{{route('barang.viewriwayat')}}" class="btn btn-secondary" style="color: white;">
                            <i class="fe fe-repeat"></i>Riwayat
                        </a>
                    @endif
                </div>

                <!-- Filter Bulan, Tahun, dan Kondisi -->
                <form id="filterForm" method="GET" action="{{ route('barang.view') }}" class="mb-4">
                    <div class="row">
                        <!-- Dropdown Bulan -->
                        <div class="col-md-3">
                            <select class="form-control" id="filterBulan" name="bulan">
                                <option value="">Pilih Bulan</option>
                                @foreach ($bulanTahun as $item)
                                    <option value="{{ $item->bulan }}" {{ request('bulan') == $item->bulan ? 'selected' : '' }}>
                                        {{ \Carbon\Carbon::create()->month($item->bulan)->isoFormat('MMMM') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown Tahun -->
                        <div class="col-md-3">
                            <select class="form-control" id="filterTahun" name="tahun">
                                <option value="">Pilih Tahun</option>
                                @foreach ($bulanTahun->pluck('tahun')->unique() as $tahun)
                                    <option value="{{ $tahun }}" {{ request('tahun') == $tahun ? 'selected' : '' }}>
                                        {{ $tahun }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Dropdown Kondisi -->
                        <div class="col-md-3">
                            <select class="form-control" id="filterKondisi" name="kondisi">
                                <option value="">Pilih Kondisi</option>
                                @foreach ($kondisiBarang as $kondisi)
                                    <option value="{{ $kondisi->kondisi_brg }}" {{ request('kondisi') == $kondisi->kondisi_brg ? 'selected' : '' }}>
                                        {{ $kondisi->kondisi_brg }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Tombol Filter dan Reset -->
                        <div class="col-md-3">
                            <button type="submit" class="btn btn-primary">Filter</button>
                            <button type="button" class="btn btn-secondary" id="resetButton">Hapus Filter</button>
                        </div>
                    </div>
                </form>

                <!-- Script untuk tombol Reset -->
                <script>
                    document.getElementById('resetButton').addEventListener('click', function () {
                        // Mengarahkan ke URL tanpa query string untuk mereset filter
                        window.location.href = "{{ route('barang.view') }}";
                    });
                </script>


                <div class="row">
                    <!-- simple table -->
                    <div class="col-md-12 my-4">
                        <div class="card shadow">
                            <div class="card-body">
                                <div class="d-flex align-items-center mb-3">
                                    <div class="mr-3">
                                        <strong>Total Barang Baik: </strong>{{ $totalBaik }}
                                    </div>
                                    <div class="mr-3">
                                        <strong>Total Barang Kurang Baik: </strong>{{ $totalKurangBaik }}
                                    </div>
                                    <div>
                                        <strong>Total Barang Rusak Berat: </strong>{{ $totalRusakBerat }}
                                    </div>
                                </div>

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
                                                <td>{{ \Carbon\Carbon::parse($barang->tgl_masuk)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{ \Carbon\Carbon::parse($barang->tgl_update)->translatedFormat('d F Y') }}
                                                </td>
                                                <td>{{$barang->jenis_brg}}</td>

                                                @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                                                    <td>
                                                        <button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <span class="text-muted sr-only">Action</span>
                                                        </button>
                                                        <div class="dropdown-menu dropdown-menu-right">
                                                            <a class="dropdown-item"
                                                                href="{{route('barang.detail', $barang->id)}}">Detail</a>
                                                            <a class="dropdown-item"
                                                                href="{{route('barang.edit', $barang->id)}}">Ubah</a>
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

<script>
    document.getElementById('resetButton').addEventListener('click', function () {
        // Menghapus pilihan di dropdown
        document.getElementById('filterBulan').selectedIndex = 0; // Reset dropdown bulan
        document.getElementById('filterTahun').selectedIndex = 0; // Reset dropdown tahun

        // Mengarahkan ke URL tanpa parameter filter
        window.location.href = "{{ route('barang.view') }}";
    });
</script>

@endsection