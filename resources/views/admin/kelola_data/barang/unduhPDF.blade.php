<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Unduh Barang</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
            padding: 10px;
            text-align: left;
        }

        h3 {
            text-align: center;
        }
    </style>
</head>

<body>
    <h3>Data Barang - Ruangan: {{ $ruangan }}</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
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
        <tbody>
            @foreach ($allDataBarang as $key => $barang)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $barang->kd_brg }}</td>
                    <td>{{ $barang->nm_brg }}</td>
                    <td>{{ $barang->ruangan }}</td>
                    <td>{{ $barang->baik }}</td>
                    <td>{{ $barang->kurang_baik }}</td>
                    <td>{{ $barang->rusak_berat }}</td>
                    <td>{{ ($barang->baik ?? 0) + ($barang->kurang_baik ?? 0) + ($barang->rusak_berat ?? 0) }}</td>
                    <td>{{ $barang->ket }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>