@extends('layouts.layout')
@section('title')
Edit Exercise
@endsection
@section('content')

@section('head-title')
<span class="text-warning font-weight-bolder"> Premium </span> Exercises
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Exercise : {{ $exercise->name }}</h1>
                                </div>



                                <form class="user" method="POST" action="{{ url('edit-exercise', $exercise->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{ $exercise->name }}" name="exercise_name"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Exercise Category</label>
                                        <select class="form-control" name="exercise_category">
                                            @foreach (DB::table('categories')->get() as $cat)
                                                @if ($exercise->Category->id == $cat->id)
                                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}</option>
                                                @endif
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Rips</label>
                                        <input type="number" value="{{ $exercise->repeat_count }}" name="exercise_repeat_count"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Time <span>(seconds)</span></label>
                                        <input type="number" value="{{ $exercise->timee }}" name="exercise_time"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Calories</label>
                                        <input type="number" value="{{ $exercise->calories }}" name="exercise_calories"
                                            class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" value="{{ $exercise->url }}" name="exercise_url"
                                            class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label for="current_icon">Current Image</label>
                                        <img src="{{ asset('uploads/' . $exercise->image) }}" class="rounded" height="100px"
                                            alt="">
                                        <br>
                                        <label>New Image</label>
                                        <input type="file" name="exercise_image" class="form-control">
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
                                        <a class="btn btn-dark" href="{{ url('/exercises', []) }}">Back</a>
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
