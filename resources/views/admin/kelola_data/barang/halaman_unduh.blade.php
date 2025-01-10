@extends('admin.admin_master')
@section('admin')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Unduh Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET">
                            @csrf
                            <div class="form-group">
                                <label for="unduh_ruangan">Pilih Ruangan</label>
                                <select name="unduh_ruangan" id="unduh_ruangan" class="form-control" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach($ruangan as $Ruangan)
                                        <option value="{{ $Ruangan->id }}">{{ $Ruangan->nm_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </form>

                        <!-- Tambahkan tabel data barang -->
                        <div class="table-responsive mt-4">
                            <h4>Data Barang</h4>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>NO</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Ruangan</th>
                                        <th>Keadaan Baik</th>
                                        <th>Keadaan Kurang Baik</th>
                                        <th>Keadaan Rusak Berat</th>
                                        <th>Jumlah</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody id="data-barang-tbody">
                                    <!-- Data Barang Akan Ditampilkan di Sini -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<script>
    document.getElementById('unduh_ruangan').addEventListener('change', function () {
        const ruanganId = this.value;

        if (ruanganId) {
            fetch(`/get-barang-by-ruangan?ruangan_id=${ruanganId}`)
                .then(response => response.json())
                .then(data => {
                    const tbody = document.getElementById('data-barang-tbody');
                    tbody.innerHTML = ''; // Kosongkan tabel sebelum menambahkan data baru

                    if (data.length > 0) {
                        data.forEach((barang, index) => {
                            tbody.innerHTML += `
                                <tr>
                                    <td>${index + 1}</td>
                                    <td>${barang.kd_brg}</td>
                                    <td>${barang.nm_brg}</td>
                                    <td>${barang.ruangan}</td>
                                    <td>${barang.baik ?? 0}</td>
                                    <td>${barang.kurang_baik ?? 0}</td>
                                    <td>${barang.rusak_berat ?? 0}</td>
                                    <td>${(barang.baik ?? 0) + (barang.kurang_baik ?? 0) + (barang.rusak_berat ?? 0)}</td>
                                    <td>${barang.ket}</td>
                                </tr>
                            `;
                        });
                    } else {
                        tbody.innerHTML = `<tr><td colspan="9" class="text-center">Tidak ada data barang untuk ruangan ini.</td></tr>`;
                    }
                })
                .catch(error => console.error('Error fetching data:', error));
        } else {
            // Kosongkan tabel jika tidak ada ruangan yang dipilih
            document.getElementById('data-barang-tbody').innerHTML = `<tr><td colspan="9" class="text-center">Silakan pilih ruangan terlebih dahulu.</td></tr>`;
        }
    });
</script>
@endsection