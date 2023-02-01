@extends('layouts.layout')
@section('title')
Payment History
@endsection
@section('css')
<!-- Custom styles for this page -->
@endsection


@section('content')

@section('head-title')
Payment History
@endsection

        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>Payment History
                        <button
                            class="btn disabled btn-info text-light">
                            {{ DB::table('history_payments')->count() }}
                        </button>
                        <button class="btn disabled btn-success text-light">
                            {{ DB::table('history_payments')->sum('amount') }}$
                        </button>
                    </h3>

                    <a href="{{ url('packages/add') }}" class="btn btn-success">Add Package</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                                        {{$history->user->name}}
                                        {{-- {{ DB::table('customers')->where('id', '=', $history->user_id)->get()[0]->name }} --}}
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

                    <tfoot>
                        <tr>
                            <th colspan="4"><div class="d-flex justify-content-center">{{ $histories->links() }}</div></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>

@endsection
