@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="card shadow custom-card">
        <div class="card-body p-5">
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2>Data Pengaduan</h2>
                    <img src="{{asset('storage/' . $detailData_pengaduan->foto)}}" style="width: 200px; height: auto;"
                        class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                </div>

                <div class="col-md-7">
                    <p class="small text-muted text-uppercase mb-2">Tanggal Pengaduan</p>
                    <p class="mb-4">
                        <strong>{{$detailData_pengaduan->tgl_pengaduan}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Keterangan</span><br />
                        <strong>{{$detailData_pengaduan->ket}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Kondisi Barang</span><br />
                        <strong>{{$detailData_pengaduan->id_kondisi_brg}}</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Nama Status Pengaduan</span><br />
                        <strong>{{$detailData_pengaduan->nm_status_pengaduan}}</strong>
                    </p>
                </div>
                <div class="col-md-5">
                    <p class="small text-muted text-uppercase mb-2">Tanggal Masuk</p>
                    <p class="mb-4">
                        <strong>{{$detailData_pengaduan->tgl_masuk}}</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Tanggal Update</small><br />
                        <strong>{{$detailData_pengaduan->tgl_update}}</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Inventarisasi</small><br />
                        <strong>{{$detailData_pengaduan->id_inventarisasi}}</strong>
                    </p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</main>

@endsection