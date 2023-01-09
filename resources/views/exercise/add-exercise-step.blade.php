@extends('layouts.main')
@section('title')
    Add Exercise Step
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Exercise Step</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('add-exercise-step', $exercise->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="exercise_description" class="form-control" cols="30" rows="2"></textarea>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a class="btn btn-dark" href="{{ url('/exercise-steps', $exercise->id) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
