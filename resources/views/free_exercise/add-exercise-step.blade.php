@extends('layouts.layout')
@section('title')
Add Free Exercises Step
@endsection
@section('content')

@section('head-title')
Free Exercises Steps
@endsection

<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-10 col-lg-9 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-8 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New <span class="font-weight-bold">"{{$exercise->name}}"</span>  Step</h1>
                                </div>


                                <form class="user" method="POST" action="{{ url('free_add-exercise-step', $exercise->id) }}"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group">
                                        <label>Description</label>
                                        <textarea name="exercise_description" class="form-control" cols="30" rows="2"></textarea>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-dark" href="{{ url('/free_exercise-steps', $exercise->id) }}">Back</a>
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
