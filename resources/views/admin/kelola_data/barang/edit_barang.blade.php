@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-left">
            <div class="col-md-9 my-4">
                <h2 class="page-title">Edit Data Barang</h2>
                <div class="card-deck">

                    <div class="card shadow mb-4">
                        <div class="card-header">
                            <strong class="card-title">Edit Data </strong>
                        </div>
                        <div class="card-body">
                            <form method="post" action="{{route('barang.update', $editDataBarang->id)}}"
                                enctype="multipart/form-data">
                                @csrf

                                <div class="form-group row">
                                    <label for="textKodebrg" class="col-sm-3 col-form-label">Kode Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="textKodebrg" id="textKodebrg"
                                            value="{{$editDataBarang->kd_brg}}" placeholder="Kode Barang">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textNmbrg" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="textNmbrg" id="textNmbrg"
                                            value="{{$editDataBarang->nm_brg}}" placeholder="Nama Barang">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textBrgBaik" class="col-sm-3 col-form-label">Kondisi Baik</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="textBrgBaik" id="textBrgBaik"
                                            value="{{$editDataBarang->baik}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textBrgKurangBaik" class="col-sm-3 col-form-label">Kondisi Kurang
                                        Baik</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="textBrgKurangBaik"
                                            id="textBrgKurangBaik" value="{{$editDataBarang->kurang_baik}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textBrgRusakBerat" class="col-sm-3 col-form-label">Kondisi Rusak
                                        Berat</label>
                                    <div class="col-sm-9">
                                        <input type="number" class="form-control" name="textBrgRusakBerat"
                                            id="textBrgRusakBerat" value="{{$editDataBarang->rusak_berat}}">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textKet" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="textKet" id="textKet"
                                            value="{{$editDataBarang->ket}}" placeholder="Keterangan">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textJenisBrg" class="col-sm-3 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="textJenisBrg" id="custom-select">
                                            <option selected disabled>Pilih Jenis Barang</option>

                                            @foreach ($jenis_barang as $JenisBarang)
                                                <option value="{{$JenisBarang->jns_brg}}"
                                                    {{($editDataBarang->jenis_brg == $JenisBarang->jns_brg ? "selected" : "")}}>
                                                    {{$JenisBarang->jns_brg}}
                                                </option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group mb-2">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
</main> <!-- main -->

@endsection