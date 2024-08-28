@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-12">
        <div class="row align-items-center mb-2">
          <div class="col">
            <h2 class="h5 page-title">Data Grafik</h2>
          </div>
        </div>

        <!-- Grafik -->
        <div class="row my-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <h5 class="card-title">Grafik Barang Masuk per Bulan</h5>
                <canvas id="barangChart"></canvas> <!-- Canvas untuk grafik -->
              </div>
            </div>
          </div>
        </div> <!-- end Grafik -->

      </div> <!-- .col-12 -->
    </div> <!-- .row -->
  </div> <!-- .container-fluid -->
</main> <!-- main -->

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('barangChart').getContext('2d');
    var barangChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode($dataGrafik->pluck('bulan')) !!}, // Menampilkan bulan
        datasets: [{
          label: 'Jumlah Barang Masuk',
          data: {!! json_encode($dataGrafik->pluck('jumlah')) !!}, // Menampilkan jumlah barang
          backgroundColor: 'rgba(54, 162, 235, 0.5)',
          borderColor: 'rgba(54, 162, 235, 1)',
          borderWidth: 1
        }]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true
          }
        }
      }
    });
  });
</script>


@endsection