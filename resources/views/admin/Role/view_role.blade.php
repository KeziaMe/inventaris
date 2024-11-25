@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Peran</h2>
                <div class="col text-end mb-3">
                    <a href="{{route('role.tambah')}}" class="btn btn-success" style="color: white;">
                        <i class="fe fe-plus"></i>Tambah
                    </a>
                </div>

                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table dataTables" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Peran</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allDataRole as $key => $role)

                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$role->role}}</td>

                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('role.edit', $role->id)}}">Ubah</a>
                                                <a class="dropdown-item" id="delete"
                                                    href="{{route('role.hapus', $role->id)}}">Hapus</a>
                                            </div>
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