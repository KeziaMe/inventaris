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
    var kondisiChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: {!! json_encode(array_column($dataGrafik, 'bulan')) !!}, // Menampilkan bulan
        datasets: [
          {
            label: 'Baik',
            data: {!! json_encode(array_column($dataGrafik, 'baik')) !!}, // Data kondisi baik
            backgroundColor: 'rgba(54, 162, 235, 0.5)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Kurang Baik',
            data: {!! json_encode(array_column($dataGrafik, 'kurang_baik')) !!}, // Data kondisi kurang baik
            backgroundColor: 'rgba(255, 206, 86, 0.5)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          },
          {
            label: 'Rusak Berat',
            data: {!! json_encode(array_column($dataGrafik, 'rusak_berat')) !!}, // Data kondisi rusak berat
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
            ticks: {
              stepSize: 1, // Atur stepSize untuk bilangan bulat
              callback: function (value, index, values) {
                return Number.isInteger(value) ? value : ''; // Menampilkan hanya bilangan bulat
              }
            }
          },
          x: {
            stacked: true // Menampilkan diagram batang secara stack untuk per bulan
          }
        }
      }
    });
  });
</script>
@endsection