@extends('layouts.main')
@section('title')
    Premium Users
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Premium Users <span
                            class="bg-secondaty">({{ DB::table('customers')->where('is_subscribed', '=', '1')->count() }})</span>
                    </h3>
                    <a href="{{ url('/users/premium/assign', []) }}" class="text-light">
                        <button class="btn btn-success">Assign Subscription</button>
                    </a>
                </div>

                <table class="table table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col"></th>
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
                            <th scope="col">Actions</th>
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
                                    $remaining = strtotime($user->subscription_finished_at) - strtotime($user->subscription_started_at);
                                @endphp
                                <td>{{ $remaining / 86400 }}</td>

                                <td>{{ floor($remaining / 2.628e6) }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('user', $user->id) }}">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a class="btn btn-sm btn-warning" href="{{ url('users/premium/user', $user->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $users->links() }}
    </div>
@endsection
