@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Edit Data Inventarisasi</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('inventarisasi.update', $editDataInventarisasi->id)}}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row align-items-center">
                                    <label for="textNamaRuangan" class="col-sm-3 col-form-label">Nama Ruangan</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="textNamaRuangan"
                                            id="textNamaRuangan-select">
                                            <option selected disabled>Pilih Nama Ruangan</option>

                                            @foreach ($ruangan as $Ruangan)
                                                <option value="{{$Ruangan->nm_ruangan}}"
                                                    {{($editDataInventarisasi->nm_ruangan == "$Ruangan->nm_ruangan" ? "selected" : "")}}>{{$Ruangan->nm_ruangan}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textKodeBarang" class="col-sm-3 col-form-label">Kode Barang</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="textKodeBarang" id="textKodeBarang">
                                            <option selected disabled>Pilih Kode Barang</option>

                                            @foreach ($barangs as $barang)
                                                <option value="{{$barang->kd_brg}}"
                                                    {{($editDataInventarisasi->kd_brg == "$barang->kd_brg" ? "selected" : "")}}>{{$barang->kd_brg}} - ({{$barang->nm_brg}})</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textTglInventaris" class="col-sm-3 col-form-label">Tanggal
                                        Inventaris</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="textTglInventaris" type="date"
                                            name="textTglInventaris" value="{{$editDataInventarisasi->tgl_inventaris}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textStatus" class="col-sm-3 col-form-label">Status</label>
                                    <div class="col-md-6 mb-4">
                                        <div class="card shadow">
                                            <div class="card-body">
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="textstatus1" name="textstatus"
                                                        class="custom-control-input" value="Aktif"
                                                        @if($editDataInventarisasi->status == 'Aktif') checked @endif>
                                                    <label class="custom-control-label" for="textstatus1">Aktif</label>
                                                </div>
                                                <div class="custom-control custom-radio">
                                                    <input type="radio" id="textstatus2" name="textstatus"
                                                        class="custom-control-input" value="Non-Aktif"
                                                        @if($editDataInventarisasi->status == 'Non-Aktif') checked @endif>
                                                    <label class="custom-control-label"
                                                        for="textstatus2">Non-Aktif</label>
                                                </div>
                                            </div> <!-- /.card-body -->
                                        </div> <!-- /.card -->
                                    </div> <!-- /.col -->
                                </div> <!-- /.form-group -->

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
</main> <!-- main -->

@endsection