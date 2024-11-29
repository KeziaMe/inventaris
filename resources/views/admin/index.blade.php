@extends('admin.admin_master')
@section('admin')
<main role="main" class="main-content">
  <div class="container-fluid">
    <!-- Header -->
    <div class="row justify-content-center mb-4">
      <div class="col-12 text-center">
        <h1 class="display-4">Dashboard</h1>
        <h3 class="text-primary">SMPK BAKTI ROGOJAMPI</h3>
        <p class="text-muted">Selamat datang, pantau perkembangan sekolah dengan mudah.</p>
      </div>
    </div>

    <!-- Statistik Utama -->
    <div class="row">
      <!-- Siswa -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow border-left-primary">
          <div class="card-body">
            <h5 class="card-title">Jumlah Siswa</h5>
            <h3 class="text-primary">1,250</h3>
            <p class="text-muted">Siswa terdaftar</p>
          </div>
        </div>
      </div>

      <!-- Guru -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow border-left-success">
          <div class="card-body">
            <h5 class="card-title">Jumlah Guru</h5>
            <h3 class="text-success">75</h3>
            <p class="text-muted">Guru aktif</p>
          </div>
        </div>
      </div>

      <!-- Kelas -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow border-left-warning">
          <div class="card-body">
            <h5 class="card-title">Jumlah Kelas</h5>
            <h3 class="text-warning">30</h3>
            <p class="text-muted">Kelas berjalan</p>
          </div>
        </div>
      </div>

      <!-- Prestasi -->
      <div class="col-lg-3 col-md-6 mb-4">
        <div class="card shadow border-left-danger">
          <div class="card-body">
            <h5 class="card-title">Prestasi Sekolah</h5>
            <h3 class="text-danger">15</h3>
            <p class="text-muted">Prestasi diraih tahun ini</p>
          </div>
        </div>
      </div>
    </div>

    <!-- Informasi dan Grafik -->
    <div class="row">
      <!-- Grafik Kehadiran -->
      <div class="col-lg-12 mb-4">
        <div class="card shadow">
          <div class="card-header bg-primary text-white">
            Grafik Kehadiran Siswa
          </div>
          <div class="card-body">
            <canvas id="attendanceChart"></canvas>
          </div>
        </div>
      </div>

    </div>
  </div>
</main>
@endsection