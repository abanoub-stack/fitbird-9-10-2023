@extends('layouts.main')
@section('title')
    Notifications
@endsection
@section('main')
    <div class="container-fluid text-center py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h3>All Notifications</h3>
                    <a href="{{ url('notifications/delete-all', []) }}" class="btn btn-danger">Delete All Notifications</a>
                </div>

                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col"></th>
                            <th scope="col">Admin</th>
                            <th scope="col">Content</th>
                            <th scope="col">Time</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($notifications as $i => $ntf)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $ntf->admin }}</td>
                                <td>{{ $ntf->message }}</td>
                                <td>{{ $ntf->created_at }}</td>
                                <td>
                                    @if ($ntf->readed !== '0')
                                        <h5 class="btn btn-sm btn-success mt-2" style="cursor: none;"
                                            href="{{ url('notifications/mark-as-read', $ntf->id) }}">
                                            <i class="fas fa-eye"> Readed</i>
                                        </h5>
                                    @else
                                        <a class="btn btn-sm btn-dark"
                                            href="{{ url('notifications/mark-as-read', $ntf->id) }}">
                                            <i class="fas fa-eye bg-dark text-light"> Mark As Read</i>
                                        </a>
                                    @endif

                                    <a class="btn btn-sm btn-danger mt-1"
                                        href="{{ url('notifications/delete', $ntf->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

        </div>
    </div>
@endsection
