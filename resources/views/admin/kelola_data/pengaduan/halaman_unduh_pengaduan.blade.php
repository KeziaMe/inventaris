@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Unduh Laporan Pengaduan</h2>
                <div class="col text-end">

                    <!-- Form untuk Memilih Bulan dan Tahun -->
                    <form action="{{ route('pengaduan.unduhBulan') }}" method="GET" class="form-inline mt-3">
                        <div class="form-group">
                            <label for="bulan" class="mr-2">Pilih Bulan:</label>
                            <select name="bulan" id="bulan" class="form-control mr-2">
                                <option value="01">Januari</option>
                                <option value="02">Februari</option>
                                <option value="03">Maret</option>
                                <option value="04">April</option>
                                <option value="05">Mei</option>
                                <option value="06">Juni</option>
                                <option value="07">Juli</option>
                                <option value="08">Agustus</option>
                                <option value="09">September</option>
                                <option value="10">Oktober</option>
                                <option value="11">November</option>
                                <option value="12">Desember</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="tahun" class="mr-2">Pilih Tahun:</label>
                            <select name="tahun" id="tahun" class="form-control mr-2">
                                @for ($i = 2020; $i <= date('Y'); $i++)
                                    <option value="{{ $i }}">{{ $i }}</option>
                                @endfor
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fe fe-download"></i> Unduh Laporan
                        </button>
                    </form>
                </div>
            </div> <!-- .col-12 -->
        </div> <!-- .row -->
    </div> <!-- .container-fluid -->
</main> <!-- main -->

@endsection