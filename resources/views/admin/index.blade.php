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

        <!-- Filter Tahun -->
        <div class="row mb-4">
          <div class="col-md-12">
            <div class="card shadow">
              <div class="card-body">
                <form method="GET" action="{{ route('dashboard') }}">
                  <div class="form-group">
                    <label for="year">Pilih Tahun:</label>
                    <select name="year" id="year" class="form-control" onchange="this.form.submit()">
                      @foreach ($availableYears as $year)
              <option value="{{ $year }}" {{ $year == $selectedYear ? 'selected' : '' }}>{{ $year }}</option>
            @endforeach
                    </select>
                  </div>
                </form>
              </div>
            </div>
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

<script>
  document.addEventListener('DOMContentLoaded', function () {
    // Mengambil data dari controller
    var dataGrafik = @json($dataGrafik);
    var bulanLabels = @json($bulanLabels);
    var kondisiLabels = @json($kondisiLabels);

    // Memetakan data untuk Chart.js
    var datasets = kondisiLabels.map(function (label) {
      var warna = ''; // Tentukan warna berbeda untuk setiap kondisi
      if (label === 'Baik') {
        warna = 'rgba(75, 192, 192, 0.2)'; // Warna hijau transparan
      } else if (label === 'Kurang Baik') {
        warna = 'rgba(255, 206, 86, 0.2)'; // Warna kuning transparan
      } else if (label === 'Rusak Berat') {
        warna = 'rgba(255, 99, 132, 0.2)'; // Warna merah transparan
      }

      return {
        label: label,
        data: dataGrafik.map(function (d) {
          if (label === 'Baik') return d.baik;
          if (label === 'Kurang Baik') return d.kurang_baik;
          if (label === 'Rusak Berat') return d.rusak_berat;
        }),
        backgroundColor: warna,
        borderColor: warna.replace('0.2', '1'), // Warna border yang lebih solid
        borderWidth: 1
      };
    });

    var ctx = document.getElementById('kondisiChart').getContext('2d');

    var myChart = new Chart(ctx, {
      type: 'bar', // Gunakan tipe grafik yang sesuai
      data: {
        labels: bulanLabels, // Ganti dengan label data Anda
        datasets: datasets // Data yang telah dipetakan
      },
      options: {
        responsive: true,
        scales: {
          x: {
            beginAtZero: true,
          },
          y: {
            beginAtZero: true,
            ticks: {
              stepSize: 1, // Interval ke 1 untuk menampilkan bilangan bulat
              precision: 0 // Menampilkan hanya bilangan bulat
            }
          }
        }
      }
    });
  });
</script>

@endsection