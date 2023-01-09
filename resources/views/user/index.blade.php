@extends('layouts.main')
@section('title')
    Users
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Users</h3>
                </div>

                <table class="table table-hover">
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
                            <th scope="col">Payment Status</th>
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
                                @if ($user->is_subscribed == '1')
                                    <td class="text-success"><strong>{{ 'User Subscribed' }}</strong></td>
                                @else
                                    <td class="text-danger"><strong>{{ 'User Not Subscribed' }}</strong></td>
                                @endif
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ url('user', $user->id) }}">
                                        <i class="fas fa-eye"></i>
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
