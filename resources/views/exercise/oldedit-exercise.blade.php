@extends('layouts.main')
@section('title')
    Edit Exercise {{ $exercise->name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Exercise : {{ $exercise->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">

                        @include('layouts.errors')
                        <form method="POST" action="{{ url('edit-exercise', $exercise->id) }}" enctype="multipart/form-data">
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
                                <label>Repeat Count</label>
                                <input type="number" value="{{ $exercise->repeat_count }}" name="exercise_repeat_count"
                                    class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Time <span>(minutes)</span></label>
                                <input type="number" value="{{ $exercise->time }}" name="exercise_time"
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
@endsection
