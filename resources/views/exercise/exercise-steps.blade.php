@extends('layouts.layout')
@section('title')
Exercise {{ $exercise->name }} Steps
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Exercises Steps
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Exercise <span class="font-weight-bolder">{{ $exercise->name }}</span> Steps</h6>
        <div class="float-right">
            <a href="{{ url('add-exercise-step', $exercise->id) }}" class="btn btn-success">
                Add Step
            </a>
        </div>
    </div>
    <div class="card-body">



        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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


