@extends('layouts.layout')
@section('title')
Send Notifications
@endsection
@section('css')
<!-- Custom styles for this page -->
@endsection


@section('content')

@section('head-title')
Send Push Notification to Mobile Application
@endsection
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Notifications</h3>
                    <a href="{{ url('send-notification', []) }}" class="btn btn-success">Send Notification</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
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
                    <tfoot>
                        <tr>
                            <th colspan="2"><div class="d-flex justify-content-center">{{ $notifications->links() }}</div></th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
@endsection
