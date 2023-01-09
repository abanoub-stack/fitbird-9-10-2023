@extends('layouts.main')
@section('title')
    All Categories
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>All Categories</h3>
                        <a href="{{ url('add-category') }}" class="btn btn-success">
                            Add Category
                        </a>
                    </div>
                    <div class="container">
                        <form method="GET" action="{{ url('categories/search') }}">
                            <input class="form-control" type="text" name="keyword" placeholder="Search..."
                                @if (request()->has('keyword')) value="{{ request()->get('keyword') }}" @endif>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="text-center">
                    @if (request()->session()->has('category_added_successfully'))
                        <div class="text-success">
                            <h5>{{ request()->session()->remove('category_added_successfully') }}</h5>
                        </div>
                    @endif
                    @if (request()->session()->has('category_deleted_successfully'))
                        <div class="text-danger">
                            <h5>{{ request()->session()->remove('category_deleted_successfully') }}</h5>
                        </div>
                    @endif
                    @if (request()->session()->has('category_updated_successfully'))
                        <div class="text-primary">
                            <h5>{{ request()->session()->remove('category_updated_successfully') }}</h5>
                        </div>
                    @endif
                </div>
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Description</th>
                            <th scope="col">Level</th>
                            <th scope="col">Icon</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $i => $cat)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $cat->name }}</td>
                                <td>{{ $cat->description }}</td>
                                <td>{{ $cat->level }}</td>
                                <td><a href="{{ asset('uploads/' . $cat->icon) }}" target="_blank"><img
                                            src="{{ asset('uploads/' . $cat->icon) }}" width="150px" height="90px"
                                            alt=""></a></td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('edit-category', $cat->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-category', $cat->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">{{ $categories->links() }}</div>
    </div>
@endsection
