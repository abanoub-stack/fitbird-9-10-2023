@extends('layouts.layout')
@section('title')
Edit Free Exercises
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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Exercise : {{ $exercise->name }}</h1>
                                </div>



                                <form class="user" method="POST" action="{{ url('free_edit-exercise', $exercise->id) }}" enctype="multipart/form-data">
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
                                                <option value="{{ $cat->id }}"
                                                    @if (isset($exercise->Category))
                                                        @if ($exercise->Category->id == $cat->id)
                                                            selected
                                                        @endif
                                                    @endif
                                                    >{{ $cat->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Reps</label>
                                        <div class="row m-auto">
                                            <div class="col-12 m-auto">
                                                <p class="text-muted" style="font-size: 12px">Current Reps : <span class="font-weight-bold text-primary">{{$exercise->repeat_count}}</span></p>
                                            </div>

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
                                        <label>Time <span>(seconds)</span></label>
                                        <input type="number" value="{{ $exercise->timee }}" name="exercise_time"
                                            class="form-control">
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Calories</label>
                                        <input type="number" value="{{ $exercise->calories }}" name="exercise_calories"
                                            class="form-control">
                                    </div> --}}

                                    <div class="form-group">
                                        <label>Url</label>
                                        <br>
                                        <a target="_blank" href="{{ $exercise->url }}">Show Current Video</a>
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
                                        <a class="btn btn-dark" href="{{ url('/free_exercises', []) }}">Back</a>
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
