<!DOCTYPE html>
<html>

<head>
    <title>Laporan Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
        }

        th {
            background-color: #f4f4f4;
        }
    </style>
</head>

<body>
    <h1>Laporan Barang {{ $bulan }} {{ $tahun }}</h1>
    <table>
        <thead>
            <tr>
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
            @foreach ($dataBarang as $barang)
                <tr>
                    <td>{{ $barang->kd_brg }}</td>
                    <td>{{ $barang->nm_brg }}</td>
                    <td>{{ $barang->kondisi_brg }}</td>
                    <td>{{ $barang->ket }}</td>
                    <td>{{ $barang->tgl_masuk->format('d-m-Y') }}</td>
                    <td>{{ $barang->tgl_update->format('d-m-Y') }}</td>
                    <td>{{ $barang->jenis_brg }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>