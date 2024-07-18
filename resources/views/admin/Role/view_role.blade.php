@extends('admin.admin_master')
@section('admin')

<main role="main" class="main-content">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-12">
                <h2 class="page-title">Role</h2>
                <div class="card shadow">
                    <div class="card-body">
                        <!-- table -->
                        <table class="table dataTables" id="dataTable-1">
                            <thead>
                                <tr>
                                    <th>NO</th>
                                    <th>Role</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($allDataRole as $key => $role)

                                    <tr>
                                        <td>{{$key + 1}}</td>
                                        <td>{{$role->role}}</td>
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