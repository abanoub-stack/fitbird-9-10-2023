@extends('layouts.main')
@section('title')
    Exercise Sets
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Sets</h3>
                    <a href="{{ url('add-set', []) }}" class="btn btn-success">
                        Add Set
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Exercise Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sets as $i => $set)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $set->Category->name ?? '' }}</td>
                                <td>{{ $set->Exercise->name ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('edit-set', $set->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-set', $set->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">
            {{ $sets->links() }}
        </div>
    </div>
@endsection
