@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="card shadow custom-card">
        <div class="card-body p-5">
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2>Data Pengaduan</h2>
                    <img src="{{asset('backend/assets/images/logo2.png')}}" style="width: 200px; height: auto;"
                        class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                </div>

                <div class="col-md-7">
                    <p class="small text-muted text-uppercase mb-2">Tanggal Pengaduan</p>
                    <p class="mb-4">
                        <strong>12 Mei 2024</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Keterangan</span><br />
                        <strong>Ini Keterangan................</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Kondisi Barang</span><br />
                        <strong>Ini Kondisi barang</strong>
                    </p>
                    <p>
                        <span class="small text-muted text-uppercase">Nama Status Pengaduan</span><br />
                        <strong>Nama Status Pengaduan</strong>
                    </p>
                </div>
                <div class="col-md-5">
                    <p class="small text-muted text-uppercase mb-2">Tanggal Masuk</p>
                    <p class="mb-4">
                        <strong>25 Mei 2024</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Tanggal Update</small><br />
                        <strong>Mei, 22, 2024</strong>
                    </p>
                    <p>
                        <small class="small text-muted text-uppercase">Inventarisasi</small><br />
                        <strong>001</strong>
                    </p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</main>

@endsection