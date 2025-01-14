@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <!-- Header -->
            <div class="col-12">
                <h1 class="text-center">Dashboard Inventaris</h1>
                <p class="text-center">Kelola semua fitur inventaris dengan mudah.</p>
            </div>
        </div>

        <!-- Fitur Utama -->
        <div class="row mt-5">
            <!-- Fitur Barang -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Barang</h5>
                        <p class="card-text">Tambahkan, edit, atau hapus data barang inventaris.</p>
                        <a href="{{ route('barang.view') }}" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
            </div>

            <!-- Fitur Ruangan -->
            <div class="col-md-4 mb-4">
                <div class="card shadow text-center">
                    <div class="card-body">
                        <h5 class="card-title">Kelola Ruangan</h5>
                        <p class="card-text">Atur data ruangan tempat penyimpanan barang.</p>
                        <a href="{{ route('ruangan.view') }}" class="btn btn-primary">Masuk</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</main>

@endsection