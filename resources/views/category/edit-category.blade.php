@extends('layouts.layout')
@section('title')
Edit {{$cat->name}}
@endsection
@section('content')

@section('head-title')
Categories
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit  <span class="font-weight-bolder text-primary">{{$cat->name}}</span> </h1>
                                </div>

                                <form class="user" method="POST" action="{{ url('edit-category', $cat->id) }}" enctype="multipart/form-data">
                                    @csrf

                                    <div class="form-group">
                                        <label>Parent </label>
                                        <select name="parent_id" class="form-control">
                                            <option value="">No Parent</option>
                                            @foreach ($cats as $category)

                                                <option
                                                    @if ($category->id == $cat->parent_id)
                                                        selected
                                                    @endif
                                                    value="{{$category->id}}">{{$category->name}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>


                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{ $cat->name }}" name="category_name" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Level</label>
                                        <input type="text" value="{{ $cat->level }}" name="category_level"
                                            class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="current_icon">Current Icon</label>
                                        <img src="{{ asset('uploads/' . $cat->icon) }}"  height="100px"
                                            alt="">
                                        <br>
                                        <label>New Icon</label>
                                        <input type="file" name="category_icon" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="category_description" class="form-control" cols="30" rows="3">{{ $cat->description }}</textarea>
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

        </div>

</div>


@endsection
