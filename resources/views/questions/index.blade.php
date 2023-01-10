@extends('layouts.main')
@section('title')
    Questions
@endsection
@section('main')
    <div class="container-fluid  py-5">
        <div class="row">

            <div class="col-md-10 offset-md-1">


                {{-- Page Title --}}
                <div class="row">
                    <div class="col-12">
                        <h3>All Questions</h3>
                    </div>
                </div>
                {{-- Page Title --}}

                <div class="row justify-content-center align-items-center">
                    {{-- Search Input --}}
                    <div class="col-lg-10 col-md-12">
                        <input class="form-control opacity-50" id="myInput" type="text" placeholder="Search Table">
                    </div>
                    {{-- Search Input --}}

                    {{-- Add New Btn --}}
                    <div class="col-lg-2 col-md-12">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <a href="{{ route('question.create') }}" class="btn btn-success">Add Question</a>
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
                                <th scope="col">Tile</th>
                                <th scope="col">Type</th>
                                <th scope="col">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="tableData">
                            {{-- Start Fetch Data --}}
                            @foreach ($questions as $question)
                                {{-- {{dd($question->admin)}} --}}
                                <tr>
                                    <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $question->title }}</td>
                                    <td>{{ $question->type }}</td>
                                    <td>
                                    <a href="{{ route('question.edit', $question->id) }}" class="btn-lg text-dark">
                                        edit
                                    </a>
                                    <a href="{{ route('question.delete', $question->id) }}" class="btn-lg text-danger">
                                        delete
                                    </a>
                                    <a href="{{ route('question.show', $question->id) }}" class="btn-lg text-primary">
                                        show
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
    </div>
@endsection
