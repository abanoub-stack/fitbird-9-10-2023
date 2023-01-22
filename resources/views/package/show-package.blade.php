@extends('layouts.layout')
@section('title')
Show Package {{ $packages->first()->name }}
@endsection

@section('css')
<!-- Custom styles for this page -->
@endsection

@section('head-title')
Packages
@endsection



@section('content')

{{-- Card --}}
<div class="row">
    <div class="col-md-12">

    </div>
</div>

{{-- Table --}}
<div class="row">
    <div class="col-md-12">

        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">  <span style="font-size: 20px" class="font-weight-bolder"> {{ $packages->first()->name }} </span>    Package </h6>
                <div class="float-right">
                    <a class="btn btn-dark" href="{{ url('packages', []) }}">Back</a>
                </div>
            </div>
            <div class="card-body">

                {{-- Table 1 --}}
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center text-primary font-weight-bold">User</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td>
                                        <a class="nav-link px-0" href="{{ url('user', [$customer->id]) }}">
                                            {{ $customer->name }}
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <th scope="row">Phone</th>
                                    <td>{{ $customer->phone }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Gender</th>
                                    <td>{{ $customer->gender }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Workout Intensity</th>
                                    <td>{{ $customer->workout_intensity ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Age</th>
                                    <td>{{ $customer->age ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Height</th>
                                    <td>{{ $customer->height ?? '' }}</td>
                                </tr>

                                <tr>
                                    <th scope="row">Exercise Days</th>
                                    <td>{{ $customer->exercise_days ?? '' }}</td>
                                </tr>
                                <tr>
                                    <th scope="row">Joined At</th>
                                    <td>{{ $customer->created_at ?? '' }}</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                {{-- Table 1 --}}


                <hr class="my-5">

                {{-- Table 2 --}}
                <table class="table table-bordered">
                    <thead>
                        <th colspan="6" class="text-center text-primary font-weight-bold">Exercises</th>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Repeat</th>
                            <th>Url</th>
                            <th>Time</th>
                            <th>Calories</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($packages as $i => $package)
                            <tr>
                                <td>{{ $i + 1 }}</td>
                                <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->name }}
                                </td>
                                <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->repeat_count }}
                                </td>
                                <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->url }}
                                </td>
                                <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->time }}
                                </td>
                                <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->calories }}
                                </td>
                                <td><a target="_blank"
                                        href="{{ url('uploads/' .DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->image) }}"><img
                                            width="130px" height="100px"
                                            src="{{ asset('uploads/' .DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->image) }}"
                                            alt="">
                                    </a></td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
                {{-- Table 2 --}}




            </div>
        </div>


    </div>

</div>




@endsection


