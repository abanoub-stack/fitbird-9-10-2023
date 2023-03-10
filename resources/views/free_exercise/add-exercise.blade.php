@extends('layouts.layout')
@section('title')
Add Free Exercises
@endsection
@section('content')

@section('head-title')
Free Exercises
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
                                    <h1 class="h4 text-gray-900 mb-4">Add New Free Exercises</h1>
                                </div>



                                <form class="user" method="POST" action="{{ url('free_add-exercise', []) }}" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Exercise Name</label>
                                        <input  value="{{old('exercise_name')}}" type="text" name="exercise_name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category</label>
                                        {{-- <input  value="{{old('')}}" type="text" name="exercise_category" class="form-control"> --}}
                                        <select name="exercise_category" class="form-control">
                                            @foreach (DB::table('categories')->get() as $cat)
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Time <span>(seconds)</span></label>
                                        <input  value="{{old('exercise_time')}}" type="number" name="exercise_time" class="form-control">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Calories</label>
                                        <input  value="{{old('exercise_calories')}}" type="number" name="exercise_calories" class="form-control">
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Reps</label>
                                        <div class="row m-auto">
                                            <div class="col-lg-2 col-md-4">
                                                <input  value="{{old('reps')}}" placeholder="Reps" type="number" min="1" name="reps" class="form-control d-inline">
                                            </div>
                                            X
                                            <div class="col-lg-2 col-md-4">
                                                <input  value="{{old('sets')}}" placeholder="Sets" type="number" min="1" name="sets" class="form-control d-inline">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Url</label>
                                        <input  value="{{old('exercise_url')}}" type="text" name="exercise_url" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Exercise image</label>
                                        <input  type="file" name="exercise_image" class="form-control">
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-dark" href="{{ url('free_exercises', []) }}">Back</a>
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
