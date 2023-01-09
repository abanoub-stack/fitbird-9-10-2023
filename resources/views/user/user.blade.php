@extends('layouts.main')
@section('title')
    Show User
@endsection
@section('main')
    <div class="container-fluid text-capitalize text-center py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show User : {{ $user->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">User</th>
                            </thead>
                            <tbody>
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

                                {{-- @if ($user->stripe_id == null)
                                    <tr>
                                        <th scope="row">Subscription</th>
                                        <td>{{ $user->stripe_id ?? 'User Not Subscribed' }}</td>
                                    </tr>
                                @endif --}}

                                {{-- @if ($user->stripe_id !== null)
                                    <tr>
                                        <th scope="row">Payment Stripe Token</th>
                                        <td>{{ $user->stripe_id }}</td>
                                    </tr>
                                @endif --}}
                            </tbody>
                        </table>
                        <a class="btn btn-dark" href="{{ url('users', []) }}">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
