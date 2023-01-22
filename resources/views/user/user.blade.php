@extends('layouts.layout')
@section('title')
Show User
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Show <span class="font-weight-bolder text-capitalize">{{ $user->name }}</span> informations
@endsection

<div class="row m-auto">

    <div class="col-md-6 col-xs-12 m-auto">
        <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}} </span> Profile Details:
    </div>
    <div class="col-md-2 col-xs-12 m-auto">
        <a class="btn btn-dark  my-1 float-lg-right" href="{{ url('users', []) }}">Back</a>
    </div>
    <div class="col-md-10 col-xs-12 m-auto">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Email</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>{{ $user->phone }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>{{ $user->gender }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Workout Intensity</th>
                            <td>{{ $user->workout_intensity }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Age</th>
                            <td>{{ $user->age }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Height</th>
                            <td>{{ $user->height }}</td>
                        </tr>
                        <tr>
                            <th scope="row">Exercise Days</th>
                            <td>{{ $user->exercise_days }}</td>
                        </tr>

                    </tbody>
                </table>

    </div>
</div>



{{-- Answers Table --}}

        <div class="row my-5">

            <div class="col-md-10 col-xs-12 m-auto">
                <span class="text-capitalize font-weight-bolder" style="font-size: 20px"> {{$user->name}}'s </span> Answers
            </div>

            <div class="col-md-10 col-xs-12 m-auto">
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Question</th>
                                <th scope="col">Answer</th>
                                {{-- <th scope="col">Actions</th> --}}
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            {{-- Start Fetch Data --}}
                            @if ($user->answers->count() == 0)
                                <tr>
                                    <th colspan="3">
                                        <div class="text-danger text-center font-weight-normal">
                                            No answers yet.
                                        </div>
                                    </th>
                                </tr>
                            @else
                                @foreach ($user->answers as $answer)
                                {{-- {{dd($question->admin)}} --}}
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $answer->question->title }}</td>

                                    <td>
                                        @foreach (json_decode($answer->body) as $item)
                                            {{$item}}

                                                @if($loop->iteration != count(json_decode($answer->body) ))
                                                    @if($answer->question->type == "multiple") , @endif
                                                @endif

                                        @endforeach

                                    </td>

                                </tr>
                                @endforeach
                            @endif
                            {{-- End Fetch Data --}}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>


@endsection
