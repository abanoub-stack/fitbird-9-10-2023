@extends('layouts.layout')
@section('title')
Add Exercise
@endsection
@section('content')

@section('head-title')
Exercises
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
                                    <h1 class="h4 text-gray-900 mb-4">Add New Exercise</h1>
                                </div>



                                <form class="user" method="POST" action="{{ url('add-exercise', []) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Exercise Name</label>
                                        <input type="text" name="exercise_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        {{-- <input type="text" name="exercise_category" class="form-control"> --}}
                                        <select name="exercise_category" class="form-control">
                                            @foreach (DB::table('categories')->get() as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Time <span>(minutes)</span></label>
                                        <input type="number" name="exercise_time" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Calories</label>
                                        <input type="number" name="exercise_calories" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Repeat Count</label>
                                        <input type="number" name="exercise_repeat_count" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Url</label>
                                        <input type="text" name="exercise_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Exercise image</label>
                                        <input type="file" name="exercise_image" class="form-control">
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-dark" href="{{ url('exercises', []) }}">Back</a>
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
