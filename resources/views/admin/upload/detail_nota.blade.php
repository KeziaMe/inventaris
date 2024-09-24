@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="card shadow custom-card">
        <div class="card-body p-5">
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2>Arsip Nota</h2>
                    <img src="{{asset('storage/' . $viewNota->foto_nota)}}" style="width: 300px; height: auto;"
                        class="navbar-brand-img brand-sm mx-auto mb-4" alt="">
                </div>

                <div class="col-md-5">
                    <p class="small text-muted text-uppercase mb-2">Tanggal</p>
                    <!-- Menggunakan Carbon untuk memformat tanggal -->
                    <strong>{{ \Carbon\Carbon::parse($viewNota->tgl_nota)->translatedFormat('d F Y') }}</strong>

                    <!-- Memberi jarak antara tanggal dan keterangan dengan margin-top -->
                    <div class="col-md-16 mt-4">
                        <p class="small text-muted text-uppercase mb-2">Keterangan</p>
                        <strong>{{ $viewNota->keterangan }}</strong>
                    </div>
                </div> <!-- /.row -->
            </div> <!-- /.card-body -->
        </div> <!-- /.card -->
</main>

@endsection