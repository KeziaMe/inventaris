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
                                        <input type="text" class="form-control" name="textKodebrg" id="textKodebrg"  value="{{$editDataBarang->kd_brg}}"
                                            placeholder="Kode Barang">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textNmbrg" class="col-sm-3 col-form-label">Nama Barang</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="textNmbrg" id="textNmbrg" value="{{$editDataBarang->nm_brg}}"
                                            placeholder="Nama Barang">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textKondisibrg" class="col-sm-3 col-form-label">Kondisi Barang</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="textKondisibrg" id="textKondisibrg">
                                            <option selected disabled>Pilih Kondisi Barang</option>
                                            <option value="Baik" {{($editDataBarang->kondisi_brg == "Baik" ? "selected" : "")}}>Baik</option>
                                            <option value="Kurang Baik" {{($editDataBarang->kondisi_brg == "Kurang Baik" ? "selected" : "")}}>Kurang Baik</option>
                                            <option value="Rusak Berat" {{($editDataBarang->kondisi_brg == "Rusak Berat" ? "selected" : "")}}>Rusak Berat</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="textKet" class="col-sm-3 col-form-label">Keterangan</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="textKet" id="textKet" value="{{$editDataBarang->ket}}"
                                            placeholder="Keterangan">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textTglmasuk" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="textTglmasuk" type="date" name="textTglmasuk" value="{{$editDataBarang->tgl_masuk}}">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textTglUpdate" class="col-sm-3 col-form-label">Tanggal Update</label>
                                    <div class="col-sm-9">
                                        <input class="form-control" id="textTglUpdate" type="date" name="textTglUpdate" value="{{$editDataBarang->tgl_update}}">
                                    </div>
                                </div>

                                <div class="form-group row align-items-center">
                                    <label for="textJenisBrg" class="col-sm-3 col-form-label">Jenis Barang</label>
                                    <div class="col-sm-9">
                                        <select class="custom-select" name="textJenisBrg" id="custom-select">
                                            <option selected disabled>Pilih Jenis Barang</option>
                                            <option value="Alat Elekronik" {{($editDataBarang->jenis_brg == "Alat Elekronik" ? "selected" : "")}}>Alat Elekronik</option>
                                            <option value="Mebel" {{($editDataBarang->jenis_brg == "Mebel" ? "selected" : "")}}>Mebel</option>
                                            <option value="Alat Masak" {{($editDataBarang->jenis_brg == "Alat Masak" ? "selected" : "")}}>Alat Masak</option>
                                            <option value="Alat Kebersihan" {{($editDataBarang->jenis_brg == "Alat Kebersihan" ? "selected" : "")}}>Alat Kebersihan</option>
                                            <option value="Alat Pembelajaran" {{($editDataBarang->jenis_brg == "Alat Pembelajaran" ? "selected" : "")}}>Alat Pembelajaran</option>
                                            <option value="Peralatan Olahraga" {{($editDataBarang->jenis_brg == "Peralatan Olahraga" ? "selected" : "")}}>Peralatan Olahraga</option>
                                            <option value="Peralatan UKS" {{($editDataBarang->jenis_brg == "Peralatan UKS" ? "selected" : "")}}>Peralatan UKS</option>
                                            <option value="Penghargaan" {{($editDataBarang->jenis_brg == "Penghargaan" ? "selected" : "")}}>Penghargaan</option>
                                            <option value="Peralatan Lab.IPA" {{($editDataBarang->jenis_brg == "Peralatan Lab.IPA" ? "selected" : "")}}>Peralatan Lab.IPA</option>
                                            <option value="Buku" {{($editDataBarang->jenis_brg == "Buku" ? "selected" : "")}}>Buku</option>
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