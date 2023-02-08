@extends('layouts.layout')
@section('title')
    Training Sections
@endsection
@section('content')
@section('head-title')
Training Sections Control
@endsection
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="row justify-content-center align-items-center">
                    {{-- Search Input --}}
                    <div class="col-lg-10 col-md-12">
                        <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
                    </div>
                    {{-- Search Input --}}

                    {{-- Add New Btn --}}
                    <div class="col-lg-2 col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('tsection.create') }}" class="btn btn-success">Add Section</a>
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
                                <th scope="col">Name</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            {{-- Start Fetch Data --}}
                            @foreach ($sections as $section)
                                {{-- {{dd($section->admin)}} --}}
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>

                                    <td>
                                        {{$section->name}}
                                    </td>

                                    <td>
                                        <a href="{{ route('tsection.delete', $section->id) }}" class="btn-lg text-danger">
                                            <i class="fas fa-trash"></i>
                                        </a>

                                        <a href="{{ route('tsection.edit', $section->id) }}" class="btn-lg text-info">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                    </td>

                                </tr>
                            @endforeach
                            {{-- End Fetch Data --}}
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

