@extends('layouts.main')
@section('title')
    Add Exercise
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Exercise</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('add-exercise', []) }}" enctype="multipart/form-data">
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
@endsection
