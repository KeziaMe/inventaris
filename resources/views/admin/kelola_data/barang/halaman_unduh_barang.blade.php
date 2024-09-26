@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Unduh Laporan Barang</h2>
                <div class="col text-end">
                    <form id="filter-form" action="{{ route('barang.unduhBulan.pdf') }}" method="POST"
                        class="form-inline mt-3">
                        @csrf
                        <div class="form-group">
                            <label for="bulan" class="mr-2">Pilih Bulan:</label>
                            <select name="bulan" id="bulan" class="form-control mr-2">
                                @foreach ($bulanDenganBarang as $bulan => $tahunArray)
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

                        <button type="submit" class="btn btn-primary">
                            <i class="fe fe-download"></i> Unduh Laporan
                        </button>
                    </form>
                </div>

                <h3 class="page-title mt-4">Preview Data Barang</h3>
                <table class="table" id="data-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Barang</th>
                            <th>Kondisi Barang</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Update</th>
                            <th>Jenis Barang</th>
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
    const bulanDenganBarang = @json($bulanDenganBarang);

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

        if (bulanDenganBarang[bulanFormatted]) {
            bulanDenganBarang[bulanFormatted].forEach(function (tahun) {
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
            fetch(`{{ route('api.dataBarang') }}?bulan=${bulan}&tahun=${tahun}`)
                .then(response => response.json())
                .then(data => {
                    const tableBody = document.getElementById('data-table').querySelector('tbody');
                    tableBody.innerHTML = '';

                    data.forEach((barang, index) => {
                        const row = document.createElement('tr');

                        // Format tanggal menjadi YYYY-MM-DD
                        const tglMasuk = new Date(barang.tgl_masuk);
                        const tglUpdate = new Date(barang.tgl_update);

                        const formattedTglMasuk = tglMasuk.toISOString().split('T')[0]; // Mengambil bagian tanggal
                        const formattedTglUpdate = tglUpdate.toISOString().split('T')[0]; // Mengambil bagian tanggal

                        row.innerHTML = `
                        <td>${index + 1}</td>
                        <td>${barang.nm_brg}</td>
                        <td>${barang.kondisi_brg}</td>
                        <td>${formattedTglMasuk}</td>
                        <td>${formattedTglUpdate}</td>
                        <td>${barang.jenis_brg}</td>
                    `;
                        tableBody.appendChild(row);
                    });
                })
                .catch(error => console.error('Error fetching data:', error));
        }
    }


    // Memicu perubahan pertama kali untuk mengatur default
    document.getElementById('bulan').dispatchEvent(new Event('change'));
</script>

@endsection