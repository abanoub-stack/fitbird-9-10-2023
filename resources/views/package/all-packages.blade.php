@extends('layouts.main')
@section('title')
    All Packages
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Packages</h3>
                    <a href="{{ url('packages/add') }}" class="btn btn-success">Add Package</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
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
        </div>
    </div>
@endsection

