@extends('layouts.main')
@section('title')
    Payment History
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Payment History <span
                            class="mr-2 bg-info text-light rounded p-2">{{ DB::table('history_payments')->count() }}
                        </span>
                        <span class="bg-success text-light rounded p-2">{{ DB::table('history_payments')->sum('amount') }}
                            $</span>
                    </h3>

                    <a href="{{ url('packages/add') }}" class="btn btn-success">Add Package</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">User</th>
                            <th scope="col">Date</th>
                            <th scope="col">amount</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($histories as $i => $history)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>
                                    <a href="{{ url('user', [$history->user_id]) }}">
                                        {{ DB::table('customers')->where('id', '=', $history->user_id)->get()[0]->name }}
                                    </a>
                                </td>
                                <td>{{ $history->date_time }}</td>
                                @if (substr($history->amount, -2) == '00')
                                    <td>{{ floor($history->amount) }} $</td>
                                @else
                                    <td>{{ $history->amount }} $</td>
                                @endif
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{ $histories->links() }}
    </div>
@endsection
