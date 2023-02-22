@extends('layouts.layout')
@section('title')
Premium Users
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Premium Users
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Premium Users</h6>

        <div class="float-right">
            <a href="{{ url('/users/premium/assign', []) }}"  class="btn btn-success">
                Assign Subscription
            </a>
        </div>
    </div>
    <div class="card-body">

        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Workout Intensity</th>
                            <th scope="col">Age</th>
                            <th scope="col">Height</th>
                            <th scope="col">Exercise Days</th>
                            <th>Subscription Duration</th>
                            <th>Started At</th>
                            <th>Expires At</th>
                            <th>Days Remaining</th>
                            <th>Months Remaining</th>
                            <th scope="col" style="min-width: 200px !important">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->workout_intensity }}</td>
                                <td>{{ $user->age }}</td>
                                <td>{{ $user->height }}</td>
                                <td>{{ $user->exercise_days }}</td>

                                @if ($user->subscription_type == 'month')
                                    <td>Month</td>
                                @elseif($user->subscription_type == 'three_months')
                                    <td>Three Months</td>
                                @elseif($user->subscription_type == 'six_months')
                                    <td>Six Months</td>
                                @elseif($user->subscription_type == 'year')
                                    <td>Year</td>
                                @endif

                                <td>{{ $user->subscription_started_at }}</td>
                                <td>{{ $user->subscription_finished_at }}</td>
                                @php
                                    // $remaining = \Carbon\Carbon::parse($user->subscription_finished_at) - \Carbon\Carbon::parse($user->subscription_started_at) ;
                                @endphp
                                    {{-- {{$left = \Carbon\Carbon::parse($user->subscription_finished_at)->subDays(\Carbon\Carbon::now()->dayOfWeek())}} --}}
                                {{-- <td>{{ $remaining / 86400 }}</td> --}}
                                <td>
                                    {{\Carbon\Carbon::parse($user->subscription_finished_at)->setTimezone('GMT+2')->diffInDays(now())}} days
                                </td>
                                {{-- <td>{{ floor($remaining / 2.628e6) }}</td> --}}
                                <td>
                                    {{\Carbon\Carbon::parse($user->subscription_finished_at)->setTimezone('GMT+2')->diffInMonths(now())}} months

                                </td>
                                <td >
                                    <a class="btn btn-sm btn-circle  btn-primary" href="{{ url('user', $user->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-circle btn-warning" href="{{ url('users/premium/user', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="14"><div class="d-flex justify-content-center">{{ $users->links() }}</div></th>
                        </tr>
                    </tfoot>

                </table>
            </div>
        {{-- Table --}}

    </div>
</div>



@endsection


