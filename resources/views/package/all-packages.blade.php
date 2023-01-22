@extends('layouts.layout')
@section('title')
All Packages
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Packages
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Packages</h6>
        <div class="float-right">
            <a href="{{ url('packages/add') }}" class="btn btn-success">Add Package</a>
        </div>
    </div>
    <div class="card-body">

        {{-- Table --}}
            <div class="table-responsive">
                    <table class="table table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">total exercises</th>
                                <th scope="col">For</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $i => $package)
                                <tr>
                                    <th scope="row">{{ $i + 1 }}</th>
                                    <td>{{ $package->name }}</td>
                                    <td>{{ $package->total }}</td>
                                    <td>
                                        <a href="{{ url('user', $package->customer_id) }}">
                                            ({{ DB::table('customers')->where('id', '=', $package->customer_id)->first()->name ?? '' }}
                                            |
                                            {{ DB::table('customers')->where('id', '=', $package->customer_id)->first()->phone ?? '' }})
                                        </a>
                                    </td>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" title="Show Package Details"
                                            href="{{ url('/packages/show', $package->customer_id) }}">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a class="btn btn-sm btn-danger" title="Show Package Details"
                                            href="{{ url('/packages/delete', $package->customer_id) }}">
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



@endsection

<!-- Page level plugins -->
<script src="{{asset('dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>


