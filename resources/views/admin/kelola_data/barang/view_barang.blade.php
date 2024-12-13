@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Data Barang</h2>
                <div class="col text-end mb-3">
                    <!-- Menambahkan margin bawah pada kolom tombol "Tambah" -->
                    @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                        <a href="{{route('barang.tambah')}}" class="btn btn-success" style="color: white;">
                            <i class="fe fe-plus"></i>Tambah
                        </a>
                    @endif
                    @if (auth()->user()->role == "Admin" || auth()->user()->role == "SARPRAS")
                        <a href="{{route('barang.unduh')}}" class="btn btn-primary" style="color: white;">
                            <i class="fe fe-plus"></i>Unduh
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
                                            <th>Keadaan Baik</th>
                                            <th>Keadaan Kurang Baik</th>
                                            <th>Keadaan Rusak Berat</th>
                                            <th>Jumlah</th>
                                            <th>Keterangan</th>
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
                                                <td>{{ $barang->baik }}</td>
                                                <td>{{ $barang->kurang_baik }}</td>
                                                <td>{{ $barang->rusak_berat }}</td>
                                                <td>{{($barang->baik ?? 0) + ($barang->kurang_baik ?? 0) + ($barang->rusak_berat ?? 0)}}
                                                </td>
                                                <td>{{$barang->ket}}</td>


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
    document.addEventListener('DOMContentLoaded', function () {
        // Fungsi untuk menghitung jumlah total
        function hitungJumlah() {
            const rows = document.querySelectorAll('#dataTable-1 tbody tr');
            rows.forEach(row => {
                const baik = parseInt(row.querySelector('.baik').textContent) || 0;
                const kurangBaik = parseInt(row.querySelector('.kurang_baik').textContent) || 0;
                const rusakBerat = parseInt(row.querySelector('.rusak_berat').textContent) || 0;

                // Menghitung total jumlah
                const jumlah = baik + kurangBaik + rusakBerat;

                // Menampilkan hasil perhitungan ke kolom Jumlah
                row.querySelector('.jumlah').textContent = jumlah;
            });
        }

        // Panggil fungsi hitungJumlah saat halaman dimuat
        hitungJumlah();
    });
</script>

@endsection