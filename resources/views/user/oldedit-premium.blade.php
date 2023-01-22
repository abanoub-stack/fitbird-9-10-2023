@extends('layouts.main')
@section('title')
    Show Premium User
@endsection
@section('main')
    <div class="container-fluid text-capitalize py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Show Premium User Subscription : {{ $user->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        <table class="table table-bordered">
                            <thead>
                                <th colspan="2" class="text-center">User <a
                                        href="{{ url('/user', [$user->id]) }}">{{ $user->name }}</a></th>
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
                            </tbody>
                        </table>

                        @include('layouts.errors')
                        <form action="{{ url('/users/premium/user', [$user->id]) }}" method="POST">
                            <hr>
                            <hr>
                            <h2>Edit Subscription</h2>
                            @csrf
                            <div class="form-group">
                                <h5 for="disable" class="text-center">Disable Subscription</h5>
                                <input type="checkbox" id="disable" class="form-control" name="disable">
                            </div>
                            <div class="form-group">
                                <label for="inp1" class="form-group">Subscription Type</label>
                                <select name="subscription_type" class="form-control text-dark text-center" id="">
                                    @if ($user->subscription_type == 'month')
                                        <option value="month" selected>Month</option>
                                    @else
                                        <option value="month">Month</option>
                                    @endif
                                    @if ($user->subscription_type == 'three_months')
                                        <option value="three_months" selected>Three Months</option>
                                    @else
                                        <option value="three_months">Three Months</option>
                                    @endif
                                    @if ($user->subscription_type == 'six_months')
                                        <option value="six_months" selected>Six Months</option>
                                    @else
                                        <option value="six_months">Six Months</option>
                                    @endif
                                    @if ($user->subscription_type == 'year')
                                        <option value="year" selected>Year</option>
                                    @else
                                        <option value="year">Year</option>
                                    @endif
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="inp2">Subscription Started At</label>
                                <input type="text" class="form-control" value="{{ $user->subscription_started_at }}"
                                    name="subscription_started_at" id="inp2">
                            </div>
                            <div class="form-group">
                                <label for="inp2">Subscription Expires At</label>
                                <input type="text" class="form-control" name="subscription_finished_at"
                                    value="{{ $user->subscription_finished_at }}" id="inp3">
                            </div>
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-info my-4">Update</button>
                            </div>
                        </form>

                        <a class="btn btn-dark" href="{{ url('users/premium', []) }}">Back</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
