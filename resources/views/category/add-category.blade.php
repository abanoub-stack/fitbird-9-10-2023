@extends('layouts.layout')
@section('title')
Add Category
@endsection
@section('content')

@section('head-title')
Category
@endsection

<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-8 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Category</h1>
                                </div>

                                <form class="user" action="{{ url('add-category', []) }}" enctype="multipart/form-data" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <label>Category Name</label>
                                        <input type="text" name="category_name" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group">
                                        <label>Description</label>
                                        <input type="text" name="category_description" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" name="category_level" class="form-control form-control-user">
                                    </div>
                                    <div class="form-group ">
                                        <label >Category Icon</label >
                                        <input type="file" name="category_icon" class="form-control">
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary btn-user">Add</button>
                                        <a class="btn btn-dark btn-user" href="{{ url('/categories', []) }}">Back</a>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>


@endsection
