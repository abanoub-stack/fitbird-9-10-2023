@extends('layouts.main')
@section('title')
    Show Package {{ $packages->first()->name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h4 class="mb-3">Packages/<span class="text-primary">{{ $packages->first()->name }}</span></h4>
                <div class="card">
                    <div class="card-body p-5">


                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">User</th>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><a class="nav-link" href="{{ url('user', [$customer->id]) }}">
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


                        {{-- <table class="table table-bordered">
                            <thead>
                                <th colspan="4" class="text-center">Categories</th>
                                <tr>
                                    <th>Category Name</th>
                                    <th>Category Description</th>
                                    <th>Category Level</th>
                                    <th>Category Icon</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{ $package->Category->name }}</td>
                                    <td>{{ $package->Category->description }}</td>
                                    <td>{{ $package->Category->level }}</td>
                                    <td><a target="_blank" href="{{ url('uploads', $package->Category->icon) }}"><img
                                                width="130px" height="100px"
                                                src="{{ asset('uploads/' . $package->Category->icon) }}"
                                                alt=""></a></td>
                                </tr>
                            </tbody>
                        </table> --}}


                        <table class="table table-bordered">
                            <thead>
                                <th colspan="6" class="text-center">Exercises</th>
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
                                        <td>{{ DB::table('exercises')->where('id', '=', $package->exercise_id)->first()->timee }}
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


                        <a class="btn btn-dark" href="{{ url('packages', []) }}">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
