@extends('layouts.layout')
@section('title')
Free Exercises
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
All Free Exercises
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Exercises</h6>
        <div class="float-right">
            <a href="{{ url('free_add-exercise') }}" class="btn btn-success">
                Add Exercise
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <form method="GET" action="{{ url('free_exercises/search') }}">
                <input class="form-control" type="text" name="keyword" placeholder="Search..."
                    @if (request()->has('keyword')) value="{{ request()->get('keyword') }}" @endif>
                <br>
            </form>
        </div>
    </div>
    <div class="card-body">
        {{-- Alerts --}}
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
        {{-- Alerts --}}


        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                    <tfoot>
                        <tr>
                            <th colspan="10"><div class="d-flex justify-content-center">{{ $exercises->links() }}</div></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($exercises as $i => $exercise)
                        <tr>
                            <th scope="row">{{ $i + 1 }}</th>
                            <td>{{ $exercise->name }}</td>
                            @if ($exercise->Category != null)
                            <td>{{$exercise->Category->name}}</td>
                            @else
                            <td> "NA"</td>
                            @endif
                            <td>{{ $exercise->timee }}</td>
                            <td>{{ $exercise->calories }}</td>
                            <td><a href="{{ asset('/uploads/' . $exercise->image) }}" target="_blank"><img
                                        src="{{ asset('/uploads/' . $exercise->image) }}" style="height: 90px ; object-fit: contain">
                                </a></td>
                            <td>{{ $exercise->repeat_count }}</td>
                            <td style="width: 10%"> <a href="{{ $exercise->url }}" target="_blank">Show</a> </td>
                            <td>{{ $exercise->ExerciseSteps->count() }}</td>
                            <td>{{ $exercise->created_at->diffForHumans() }}</td>
                            <td>
                                <div class="row">
                                    <div class="col-lg-4">
                                        <a title="Steps" class="btn btn-sm btn-warning text-light"
                                            href="{{ url('free_exercise-steps', $exercise->id) }}">
                                            <i class="fa fa-forward"></i>
                                        </a>
                                    </div>

                                    <div class="col-lg-4">
                                        <a title="Edit" class="btn btn-sm btn-info"
                                        href="{{ url('free_edit-exercise', $exercise->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    </div>


                                    <div class="col-lg-4">
                                        <a title="Delete" class="btn btn-sm btn-danger"
                                        href="{{ url('free_delete-exercise', $exercise->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                    </div>
                                </div>



                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        {{-- Table --}}

    </div>
</div>



@endsection

<!-- Page level plugins -->
<script src="{{asset('dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>


