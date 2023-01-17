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
                        <h3>Show Question  "{{$question->title}}"</h3>

                                  {{-- Page Title --}}
                        <div class="row">
                            <div class="col-lg-8 m-auto text-center">

                                <div class="card">
                                <div class="card-body text-left">
                                    <h4 class="card-title">Title : {{$question->title}}</h4>
                                    <p class="card-text font-weight-bolder">Type : {{$question->type}}</p>

                                    <div>
                                        @if ($question->type == 'field' || $question->type == 'area')
                                            @elseif ($question->type == 'single')
                                                <div class="card-text">Body:</div>
                                                @foreach (json_decode($question->body) as $body )
                                                            <div class="form-check">
                                                                <input class="form-check-input"   type="radio" name="choice" id="">
                                                                <label class="form-check-label" for="">
                                                                    {{$body}}
                                                                </label>
                                                            </div>
                                                    @endforeach

                                                @else
                                                <div class="card-text">Body:</div>

                                                @foreach (json_decode($question->body) as $body )

                                                <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="">
                                                <label class="form-check-label" for="">
                                                    {{$body}}
                                                </label>
                                                </div>
                                                @endforeach
                                        @endif
                                    </div>
                                </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>



                {{-- Answers Table --}}

                <div class="row my-5">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table text-center">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Answer</th>
                                        {{-- <th scope="col">Actions</th> --}}
                                    </tr>
                                </thead>
                                <tbody id="tableData">
                                    {{-- Start Fetch Data --}}
                                    @foreach ($question->answers as $answer)
                                        {{-- {{dd($question->admin)}} --}}
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $answer->customer->name }}</td>

                                            <td>
                                                @foreach (json_decode($answer->body) as $item)
                                                    {{$item}}

                                                        @if($loop->iteration != count(json_decode($answer->body) ))
                                                            @if($question->type == "multiple") , @endif
                                                        @endif

                                                @endforeach

                                            </td>

                                            {{-- <td>
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
@endsection
