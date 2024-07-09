@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">User</h2>
                <div class="col text-end mb-3"> <!-- ada jarak dengan tabel -->
                    <a href="{{route('user.tambah')}}" class="btn btn-success" style="color: white;">
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
                                    <th>Nama</th>
                                    <th>Role</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allDataUser as $key => $user)
                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$user->name}}</td>
                                        <td></td>
                                        <td>{{$user->email}}.</td>
                                        <td><button class="btn btn-sm dropdown-toggle more-horizontal" type="button"
                                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <span class="text-muted sr-only">Action</span>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="{{route('user.edit')}}">Edit</a>
                                                <a class="dropdown-item" href="#">Hapus</a>
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