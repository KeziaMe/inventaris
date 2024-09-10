<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
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
    <h2>Laporan Data Barang Bulan {{ $bulan }} Tahun {{ $tahun }}</h2>
    <table>
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
            @foreach ($allDataBarang as $key => $barang)
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
</body>

</html>