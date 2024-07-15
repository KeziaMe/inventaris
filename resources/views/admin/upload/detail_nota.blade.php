@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="card shadow custom-card">
        <div class="card-body p-5">
            <div class="row mb-5">
                <div class="col-12 text-center mb-4">
                    <h2>Arsip Nota</h2>
                    <img src="{{asset('backend/assets/images/logo2.png')}}" style="width: 200px; height: auto;"
                        class="navbar-brand-img brand-sm mx-auto mb-4" alt="...">
                </div>


                <div class="col-md-5">
                    <p class="small text-muted text-uppercase mb-2">Keterangan</p>
                    <p class="mb-4">
                        <strong>Beli pegangan pintu</strong>
                    </p>
                </div>
            </div> <!-- /.row -->
        </div> <!-- /.card-body -->
    </div> <!-- /.card -->
</main>

@endsection