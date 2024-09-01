<!DOCTYPE html>
<html>

<head>
    <title>Laporan Pengaduan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        h2 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h2>Laporan Data Pengaduan</h2>
    <table>
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