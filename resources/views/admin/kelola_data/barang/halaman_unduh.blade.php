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
                        <form action="{{ route('barang.unduh') }}" method="GET">
                            @csrf
                            <div class="form-group">
                                <label for="unduh_ruangan">Pilih Ruangan</label>
                                <select name="unduh_ruangan" id="unduh_ruangan" class="form-control" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach ($ruangan as $Ruangan)
                                    <option value="{{ $Ruangan->ruangan }}"
                                        {{ request('unduh_ruangan') == $Ruangan->ruangan ? 'selected' : '' }}>
                                        {{ $Ruangan->ruangan }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Filter</button>
                                <a href="{{ route('barang.unduh') }}" class="btn btn-secondary">Reset</a>
                                <a href="#" class="btn btn-primary" style="color: white;"></i>Unduh
                        </a>
                            </div>
                        </form>

                        <div class="mt-4">
                            <h4>Data Barang</h4>
                            <table class="table table-bordered">
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
                                        <td>{{$key + 1}}</td>
                                        <td>{{$barang->kd_brg}}</td>
                                        <td>{{$barang->nm_brg}}</td>
                                        <td>{{$barang->ruangan}}</td>
                                        <td>{{$barang->baik}}</td>
                                        <td>{{$barang->kurang_baik}}</td>
                                        <td>{{$barang->rusak_berat}}</td>
                                        <td>{{($barang->baik ?? 0) + ($barang->kurang_baik ?? 0) + ($barang->rusak_berat ?? 0)}}
                                        </td>
                                        <td>{{$barang->ket}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection