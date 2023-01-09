@extends('layouts.main')
@section('title')
    Add Exercise Category
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Category</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('add-category', []) }}" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Category Name</label>
                                <input type="text" name="category_name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Description</label>
                                <input type="text" name="category_description" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <input type="text" name="category_level" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category Icon</label>
                                <input type="file" name="category_icon" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a class="btn btn-dark" href="{{ url('/categories', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
