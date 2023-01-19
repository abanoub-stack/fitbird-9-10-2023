@extends('layouts.main')
@section('title')
    Add Set
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Set</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('add-set') }}">
                            @csrf
                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control" name="category">
                                    @foreach (DB::table('categories')->get() as $cat)
                                        <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Exercise</label>
                                <select class="form-control" name="exercise">
                                    @foreach (DB::table('exercises')->get() as $exercise)
                                        <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Add</button>
                                <a class="btn btn-dark" href="{{ url('sets', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
