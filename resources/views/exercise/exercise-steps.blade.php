@extends('layouts.main')
@section('title')
    Exercise {{ $exercise->name }} Steps
@endsection
@section('main')
    <div class="container text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Exercise {{ $exercise->name }} Steps</h3>
                    <a href="{{ url('add-exercise-step', $exercise->id) }}" class="btn btn-success">
                        Add Step
                    </a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Steps</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exercise->ExerciseSteps as $i => $step)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $step->step }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('update-exercise-step', $step->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-exercise-step', $step->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex justify-content-end mt-5">
                    <a href="{{ url('exercises', []) }}" class="btn btn-dark">Back</a>
                </div>
            </div>

        </div>
    </div>
@endsection
