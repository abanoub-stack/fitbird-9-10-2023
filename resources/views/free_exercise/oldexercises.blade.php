@extends('layouts.main')
@section('title')
    All Exercises
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h3>All Exercises</h3>
                        <a href="{{ url('add-exercise', []) }}" class="btn btn-success">
                            Add Exercise
                        </a>
                    </div>
                    <div class="container">
                        <form method="GET" action="{{ url('exercises/search') }}">
                            <input class="form-control" type="text" name="keyword" placeholder="Search..."
                                @if (request()->has('keyword')) value="{{ request()->get('keyword') }}" @endif>
                            <br>
                        </form>
                    </div>
                </div>

                <div class="text-center">
                    @if (request()->session()->has('exercise_created_successfully'))
                        <div class="text-success">
                            <h5>{{ request()->session()->remove('exercise_created_successfully') }}</h5>
                        </div>
                    @endif
                    @if (request()->session()->has('exercise_deleted_successfully'))
                        <div class="text-danger">
                            <h5>{{ request()->session()->remove('exercise_deleted_successfully') }}</h5>
                        </div>
                    @endif
                    @if (request()->session()->has('exercise_updated_successfully'))
                        <div class="text-primary">
                            <h5>{{ request()->session()->remove('exercise_updated_successfully') }}</h5>
                        </div>
                    @endif
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Name</th>
                            <th scope="col">Category</th>
                            <th scope="col">Time</th>
                            <th scope="col">Calories</th>
                            <th scope="col">Image</th>
                            <th scope="col">Repeat Count</th>
                            <th scope="col">Url</th>
                            <th scope="col">Steps</th>
                            <th scope="col">Created At</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($exercises as $i => $exercise)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $exercise->name }}</td>
                                <td>{{ $exercise->Category->name }}</td>
                                <td>{{ $exercise->time }}</td>
                                <td>{{ $exercise->calories }}</td>
                                <td><a href="{{ asset('/uploads/' . $exercise->image) }}" target="_blank"><img
                                            src="{{ asset('/uploads/' . $exercise->image) }}" width="150px"
                                            height="90px">
                                    </a></td>
                                <td>{{ $exercise->repeat_count }}</td>
                                <td>{{ $exercise->url }}</td>
                                <td>{{ $exercise->ExerciseSteps->count() }}</td>
                                <td>{{ $exercise->created_at }}</td>
                                <td>
                                    <a title="Steps" class="btn btn-sm btn-warning text-light"
                                        href="{{ url('exercise-steps', $exercise->id) }}">
                                        <i class="fa fa-forward"></i>
                                    </a>
                                    <a title="Edit" class="btn btn-sm btn-info"
                                        href="{{ url('edit-exercise', $exercise->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a title="Delete" class="btn btn-sm btn-danger"
                                        href="{{ url('delete-exercise', $exercise->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="d-flex justify-content-center">{{ $exercises->links() }}</div>
    </div>
@endsection
