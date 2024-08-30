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

<!-- Script Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', function () {
    var ctx = document.getElementById('kondisiChart').getContext('2d');
    var dataGrafik = @json($dataGrafik);

    var bulanLabels = dataGrafik.map(item => item.bulan);
    var baikData = dataGrafik.map(item => item.baik);
    var kurangBaikData = dataGrafik.map(item => item.kurang_baik);
    var rusakBeratData = dataGrafik.map(item => item.rusak_berat);

    // Menghitung nilai maxY dan stepSize
    var maxY = Math.max(...baikData, ...kurangBaikData, ...rusakBeratData);
    var stepSize = Math.ceil(maxY / 10); // Gunakan Math.ceil agar stepSize tepat

    var kondisiChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: bulanLabels,
        datasets: [
          {
            label: 'Baik',
            data: baikData,
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Kurang Baik',
            data: kurangBaikData,
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          },
          {
            label: 'Rusak Berat',
            data: rusakBeratData,
            backgroundColor: 'rgba(255, 99, 132, 0.5)',
            borderColor: 'rgba(255, 99, 132, 1)',
            borderWidth: 1
          }
        ]
      },
      options: {
        responsive: true,
        scales: {
          y: {
            beginAtZero: true,
            suggestedMin: 0,
            suggestedMax: maxY,
            ticks: {
              stepSize: stepSize, // Menentukan jarak antara ticks
              callback: function (value) {
                return Number.isInteger(value) ? value : ''; // Memastikan hanya bilangan bulat yang ditampilkan
              },
              precision: 0 // Menghindari angka desimal
            },
            grid: {
              borderColor: '#dcdcdc',
              borderWidth: 1,
              color: '#dcdcdc',
              drawBorder: true,
              drawOnChartArea: true,
              drawTicks: true
            }
          },
          x: {
            stacked: true
          }
        }
      }
    });
  });
</script>

@endsection