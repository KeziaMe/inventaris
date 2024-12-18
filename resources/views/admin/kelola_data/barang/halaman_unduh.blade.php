@extends('admin.admin_master')
@section('admin')
<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Unduh Barang</h3>
                    </div>
                    <div class="card-body">
                        <form action="#" method="GET">
                            @csrf
                            <div class="form-group">
                                <label for="unduh_ruangan">Pilih Ruangan</label>
                                <select name="unduh_ruangan" id="unduh_ruangan" class="form-control" required>
                                    <option value="">-- Pilih Ruangan --</option>
                                    @foreach($ruangan as $Ruangan)
                                        <option value="{{ $Ruangan->id }}">{{ $Ruangan->nm_ruangan }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group mt-3">
                                <button type="submit" class="btn btn-primary">Unduh Barang</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection