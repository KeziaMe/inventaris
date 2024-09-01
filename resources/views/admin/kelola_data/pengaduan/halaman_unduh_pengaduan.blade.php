@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Unduh Laporan Pengaduan</h2>
                <div class="col text-end">

                    <!-- Form untuk Memilih Bulan dan Tahun -->
                    <form action="{{ route('pengaduan.unduhBulan.pdf') }}" method="GET" class="form-inline mt-3">
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

                        <button type="submit" class="btn btn-primary">
                            <i class="fe fe-download"></i> Unduh Laporan
                        </button>
                    </form>
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->

    <script>
        const bulanDenganPengaduan = @json($bulanDenganPengaduan);

        document.getElementById('bulan').addEventListener('change', function () {
            const bulanDipilih = this.value;
            const tahunSelect = document.getElementById('tahun');

            // Kosongkan opsi tahun terlebih dahulu
            tahunSelect.innerHTML = '';

            // Pastikan bulan dipilih menggunakan format yang sesuai dengan kunci di bulanDenganPengaduan
            const bulanFormatted = parseInt(bulanDipilih, 10).toString();

            // Tambahkan opsi tahun yang sesuai dengan bulan yang dipilih
            if (bulanDenganPengaduan[bulanFormatted]) {
                bulanDenganPengaduan[bulanFormatted].forEach(function (tahun) {
                    const option = document.createElement('option');
                    option.value = tahun;
                    option.text = tahun;
                    tahunSelect.appendChild(option);
                });
            }
        });

        // Memicu perubahan pertama kali untuk mengatur default
        document.getElementById('bulan').dispatchEvent(new Event('change'));
    </script>
</main> <!-- main -->

@endsection