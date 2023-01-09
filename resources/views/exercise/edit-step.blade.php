@extends('layouts.main')
@section('title')
    Edit Step {{ $step->step }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Step : {{ $step->step }}</h3>
                <div class="card">
                    <div class="card-body p-5">

                        @include('layouts.errors')
                        <form method="POST" action="{{ url('update-exercise-step', $step->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label>Step</label>
                                {{-- <input type="text" value="{{ $step->step }}" name="step" class="form-control"> --}}
                                <textarea name="step" cols="30" class="form-control" rows="2">{{ $step->step }}</textarea>
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('/exercise-steps', $step->Exercise->id) }}">Back</a>
                            </div>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
