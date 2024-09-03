@extends('admin.admin_master')

@section('admin')
<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title">Grafik Kondisi Barang</h2>
          </div>
        </div>

        <!-- Grafik -->
        <div class="row my-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <h5 class="card-title">Grafik Jumlah Barang Berdasarkan Kondisi per Bulan</h5>
                <canvas id="kondisiChart"></canvas> <!-- Canvas untuk grafik -->
              </div>
            </div>
          </div>
        </div> <!-- end Grafik -->

      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection