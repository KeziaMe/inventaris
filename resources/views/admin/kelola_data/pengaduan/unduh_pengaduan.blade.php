<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengaduan</title>
</head>

<body>
    <h2>Laporan Data Pengaduan Bulan {{ $bulan }} Tahun {{ $tahun }}</h2>
    <table border="1" cellpadding="5" cellspacing="0">
        <thead>
            <tr>
                <th>NO</th>
                <th>Tanggal Pengaduan</th>
                <th>Kondisi Barang</th>
                <th>Nama Status Pengaduan</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Update</th>
                <th>Inventarisasi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($allDataPengaduan as $key => $pengaduan)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $pengaduan->tgl_pengaduan }}</td>
                    <td>{{ $pengaduan->id_kondisi_brg }}</td>
                    <td>{{ $pengaduan->nm_status_pengaduan }}</td>
                    <td>{{ $pengaduan->tgl_masuk }}</td>
                    <td>{{ $pengaduan->tgl_update }}</td>
                    <td>{{ $pengaduan->id_inventarisasi }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>