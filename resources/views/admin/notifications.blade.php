@extends('layouts.layout')
@section('title')
    Notifications
@endsection
@section('content')
@section('head-title')
All Notifications
@endsection
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="row justify-content-center align-items-center">
                    {{-- Search Input --}}

                    {{-- Search Input --}}

                    {{-- Add New Btn --}}
                    <div class="col-lg-12 ">
                        <div class="d-flex justify-content-between align-items-center mb-3 float-lg-right">
                            <a href="{{ url('notifications/delete-all', []) }}" class="btn btn-danger">Delete All Notifications</a>
                        </div>
                    {{-- Add New Btn --}}

                    </div>
                </div>

                {{-- Data Table --}}
                <div class="table-responsive">
                    <table class="table text-center">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
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
                {{-- Data Table --}}

            </div>

        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

        <script>
            $(document).ready(function() {
                $("#myInput").on("keyup", function() {
                    var value = $(this).val().toLowerCase();
                    $("#tableData tr").filter(function() {
                        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                    });
                });
            });
        </script>
@endsection

