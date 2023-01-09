@extends('layouts.main')
@section('title')
    Send Notification
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Notifications</h3>
                    <a href="{{ url('send-notification', []) }}" class="btn btn-success">Send Notification</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Message</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $i => $notification)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $notification->message }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="d-flex justify-content-center">
        {{ $notifications->links() }}
    </div>
@endsection
