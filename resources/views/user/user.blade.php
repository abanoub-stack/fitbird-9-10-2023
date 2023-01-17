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


        <div class="container">
            <div class="row">
                <div class="col-md-12 m-auto">

                    <div class="row my-5">
                        <div class="col-12">
                            <h3 class="mb-3">{{ $user->name }}'s Answers</h3>
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
{{--
                                                <td>
                                                <a href="{{ route('question.edit', $answer->id) }}" class="btn-lg text-dark">
                                                    <i class="fas fa-pen-square"></i>
                                                </a>
                                                <a href="{{ route('question.delete', $answer->id) }}" class="btn-lg text-danger">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                                <a href="{{ route('question.show', $answer->id) }}" class="btn-lg text-primary">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                </td> --}}
                                            </tr>
                                        @endforeach
                                        {{-- End Fetch Data --}}
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
@endsection
