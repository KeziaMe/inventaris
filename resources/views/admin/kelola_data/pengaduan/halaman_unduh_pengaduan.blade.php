@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Unduh Laporan Pengaduan</h2>
                <div class="col text-end">
                    <form id="filter-form" action="{{ route('pengaduan.unduhBulan.pdf') }}" method="POST"
                        class="form-inline mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="bulan" class="mr-2">Pilih Bulan:</label>
                            <select name="bulan" id="bulan" class="form-control mr-2">
                                @foreach ($bulanDenganPengaduan as $bulan => $tahunArray)
                                    <option value="{{ str_pad($bulan, 2, '0', STR_PAD_LEFT) }}">
                                        {{ \Carbon\Carbon::create()->month($bulan)->translatedFormat('F') }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tahun" class="mr-2">Pilih Tahun:</label>
                            <select name="tahun" id="tahun" class="form-control mr-2">
                                <!-- Tahun akan diisi melalui JavaScript -->
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">
                            <i class="fe fe-download"></i> Unduh Laporan
                        </button>
                    </form>
                </div>

                <h3 class="page-title mt-4">Preview Data Pengaduan</h3>
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal Pengaduan</th>
                            <th>Kondisi Barang</th>
                            <th>Nama Status Pengaduan</th>
                            <th>Tanggal Update</th>
                            <th>Inventarisasi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Data akan diisi melalui JavaScript -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<script>
    const bulanDenganPengaduan = @json($bulanDenganPengaduan);

    document.getElementById('bulan').addEventListener('change', function () {
        updateTahun();
        fetchData();
    });

    document.getElementById('tahun').addEventListener('change', function () {
        fetchData();
    });

    function updateTahun() {
        const bulanDipilih = document.getElementById('bulan').value;
        const tahunSelect = document.getElementById('tahun');

        tahunSelect.innerHTML = '';

        const bulanFormatted = parseInt(bulanDipilih, 10).toString();

        if (bulanDenganPengaduan[bulanFormatted]) {
            bulanDenganPengaduan[bulanFormatted].forEach(function (tahun) {
                if (tahun >= 1000) {
                    const option = document.createElement('option');
                    option.value = tahun;
                    option.text = tahun;
                    tahunSelect.appendChild(option);
                }
            });
        }
    }

    function fetchData() {
        const bulan = document.getElementById('bulan').value;
        const tahun = document.getElementById('tahun').value;

        if (bulan && tahun) {
            fetch(`{{ route('api.dataPengaduan') }}?bulan=${bulan}&tahun=${tahun}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('data-table').querySelector('tbody');
                    tableBody.innerHTML = '';

                    data.forEach((pengaduan, index) => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${pengaduan.tgl_pengaduan}</td>
                        <td>${pengaduan.id_kondisi_brg}</td>
                        <td>${pengaduan.nm_status_pengaduan}</td>
                        <td>${pengaduan.tgl_update}</td>
                        <td>${pengaduan.id_inventarisasi}</td>
                    `;
                        tableBody.appendChild(row);
                    });
                });
        }
    }

    // Memicu perubahan pertama kali untuk mengatur default
    document.getElementById('bulan').dispatchEvent(new Event('change'));
</script>

@endsection