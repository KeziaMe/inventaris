@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="card shadow custom-card">
        <div class="card-body p-5">
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2>Data Barang</h2>
                </div>

                <div class="col-md-7">
                    <p class="small text-muted text-uppercase mb-2">Kode Barang</p>
                    <p class="mb-4">
                        <strong>{{$detailData_barang->kd_brg}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Nama Barang</span><br />
                        <strong>{{$detailData_barang->nm_brg}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Kondisi Barang</span><br />
                        <strong>{{$detailData_barang->kondisi_brg}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Keterangan</span><br />
                        <strong>{{$detailData_barang->ket}}</strong>
                    </p>
                </div>
                <div class="col-md-5">
                    <p>
                        <small class="small text-muted text-uppercase">Tanggal Masuk</small><br />
                        <strong>{{ \Carbon\Carbon::parse($detailData_barang->tgl_masuk)->translatedFormat('d F Y') }}</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Tanggal Update</small><br />
                        <strong>{{ \Carbon\Carbon::parse($detailData_barang->tgl_update)->translatedFormat('d F Y') }}</strong>
                    </p>

                    <p>
                        <small class="small text-muted text-uppercase">Jenis Barang</small><br />
                        <strong>{{$detailData_barang->jenis_brg}}</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Jumlah Perbaikan</small><br />
                        <strong>{{ $jumlahPerbaikan }}</strong>
                    </p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</main>

@endsection