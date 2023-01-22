@extends('layouts.layout')
@section('title')
Admins
@endsection
@section('css')
<!-- Custom styles for this page -->
@endsection


@section('content')

@section('head-title')
Admins
@endsection


<div class="row" >
    <div class="col-md-10 col-xs-12 m-auto">
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">All Admins</h6>
                <div class="float-right">
                    <a href="{{ url('admins/add', []) }}" class="btn btn-success">Add Admin</a>
                </div>
            </div>
            <div class="card-body">

                {{-- Table --}}
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Email</th>
                                    <th scope="col" >Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $i => $admin)
                                    <tr>
                                        <td>{{ $i + 1 }}</td>
                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>
                                        <td>
                                            <a class="btn btn-sm text-center m-auto btn-circle btn-info" href="{{ url('admins/edit', [$admin->id]) }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a class="btn btn-sm text-center m-auto btn-circle btn-danger" href="{{ url('admins/delete', $admin->id) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                    </div>
                {{-- Table --}}

            </div>
        </div>
</div>
</div>



@endsection
