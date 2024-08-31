@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Arsip</h2>

                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table dataTables" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Foto</th>
                                    <th>Keterangan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allDataNota as $key => $nota)

                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>@if($nota->foto_nota)
                                                <img src="{{asset('storage/' . $nota->foto_nota)}}" alt=""
                                                    title="{{$nota->foto_nota}}" class="card-img-top"
                                                    style="width: 100px; display: block;">
                                            </td>
                                        @endif

                                        <td>{{$nota->keterangan}}</td>


                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item"
                                                    href="{{route('nota.detail', $nota->id)}}">Detail</a>
                                                <a class="dropdown-item" href="{{route('nota.hapus', $nota->id)}}">Hapus</a>
                                            </div>
                                        </td>

                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                </div>
            </div> <!-- customized table -->
        </div> <!-- end section -->
</main> <!-- main -->

@endsection