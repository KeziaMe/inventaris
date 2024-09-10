@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Edit Data Pengaduan</h2>
                <div class="card shadow mb-4">
                    <div class="card-header">
                        <strong class="card-title">Edit Data</strong>
                    </div>

                    <div class="card-body">
                        <form method="post" action="{{route('pengaduan.update', $editDataPengaduan->id)}}"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group mb-3">
                                        <label for="textTglPengaduan">Tanggal Pengaduan</label>
                                        <input class="form-control" id="textTglPengaduan" type="date"
                                            name="textTglPengaduan" value="{{$editDataPengaduan->tgl_pengaduan}}"
                                            readonly>
                                    </div>

                                    <!-- <div class="form-group mb-3">
                                        <label for="foto">Foto</label>
                                        <input type="file" id="foto" class="form-control-file" name="foto"
                                            value="{{$editDataPengaduan->foto}}">
                                    </div> -->

                                    <div class="form-group mb-3">
                                        <label for="foto">Preview Foto</label>
                                        <!-- Menampilkan preview foto -->
                                        <img id="previewFoto" src="{{asset('storage/' . $editDataPengaduan->foto)}}"
                                            alt="Preview Foto" class="foto-preview" style="width: 130px; height: auto;"
                                            style="max-width: 100%; height: auto;">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKeterangan">Keterangan</label>
                                        <input type="text" id="textKeterangan" name="textKeterangan"
                                            class="form-control" placeholder="Wajib diisi"
                                            value="{{$editDataPengaduan->ket}}" readonly>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textKondisi_brg">Kondisi Barang</label>
                                        <select class="custom-select" id="textKondisi_brg" name="textKondisi_brg">
                                            <option disabled selected>Pilih Kondisi Barang</option>
                                            <option value="Baik" {{($editDataPengaduan->id_kondisi_brg == "Baik" ? "selected" : "")}}>Baik</option>
                                            <option value="Kurang Baik" {{($editDataPengaduan->id_kondisi_brg == "Kurang Baik" ? "selected" : "")}}>Kurang Baik</option>
                                            <option value="Rusak Berat" {{($editDataPengaduan->id_kondisi_brg == "Rusak Berat" ? "selected" : "")}}>Rusak Berat</option>
                                        </select>
                                    </div>


                                    <div class="form-group row align-items-center">
                                        <label for="textStatus" class="col-sm-3 col-form-label">Nama Status
                                            Pengaduan</label>
                                        <div class="col-sm-9">
                                            <select class="custom-select" name="textStatus" id="textStatus"
                                                value="{{$editDataPengaduan->nm_status_pengaduan}}">
                                                <option selected disabled>Pilih Status Pengaduan</option>

                                                @foreach ($pengaduan as $Pengaduan)
                                                    <option value="{{$Pengaduan->status_pengaduan}}"
                                                        {{$editDataPengaduan->nm_status_pengaduan == "$Pengaduan->status_pengaduan" ? "selected" : ""}}>{{$Pengaduan->status_pengaduan}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textTgl_update">Tanggal Update</label>
                                        <input class="form-control" id="textTgl_update" type="date"
                                            name="textTgl_update" value="{{$editDataPengaduan->tgl_update}}">
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="textInventarisasi">Inventarisasi</label>
                                        <input type="text" id="textInventarisasi" class="form-control"
                                            name="textInventarisasi" value="{{$editDataPengaduan->id_inventarisasi}}"
                                            readonly>
                                    </div>

                                    <div class="form-group mb-2">
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                    </div>

                                </div>


                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

@endsection