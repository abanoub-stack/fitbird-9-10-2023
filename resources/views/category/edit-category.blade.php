@extends('layouts.main')
@section('title')
    Edit Category {{ $cat->name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Category : {{ $cat->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">

                        @include('layouts.errors')
                        <form method="POST" action="{{ url('edit-category', $cat->id) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="{{ $cat->name }}" name="category_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="category_description" class="form-control" cols="30" rows="1">{{ $cat->description }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <input type="text" value="{{ $cat->level }}" name="category_level"
                                    class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="current_icon">Current Icon</label>
                                <img src="{{ asset('uploads/' . $cat->icon) }}" class="rounded" height="100px"
                                    alt="">
                                <br>
                                <label>New Icon</label>
                                <input type="file" name="category_icon" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('/categories', []) }}">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
