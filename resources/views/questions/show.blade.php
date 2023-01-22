@extends('layouts.layout')
@section('title')
    Questions
@endsection
@section('content')
@section('head-title')
Show Question  "{{$question->title}}"
@endsection

    <div class="row">
        <div class="col-md-10 offset-md-1">
            <div class="row">
                <div class="col-lg-8 m-auto text-center">

                    <div class="card">
                    <div class="card-body text-left">
                        <h4 class="card-title">Title : {{$question->title}}</h4>
                        <p class="card-text font-weight-bolder">Description : <span class="text-muted font-weight-light"> {{$question->description}} </span></p>
                        <p class="card-text font-weight-bolder">Type : <span class="text-muted font-weight-light"> {{$question->type}}</span> </p>

                        <div class="row ">
                            <div class="col-md-12">
                                <div class="card-text font-weight-bold">Body :</div>
                            </div>

                            @if ($question->type == 'field' || $question->type == 'area')
                                {{-- No Body --}}

                            @elseif ($question->type == 'single')
                                @foreach (json_decode($question->body) as $body )
                                    <div class="col-md-4">
                                        <div class=" border-left-dark my-1 ">
                                            <input class="text-center mx-2"   type="radio" name="choice">
                                            <label class="text-center" for="">
                                                {{$body}}
                                            </label>
                                        </div>
                                    </div>
                                @endforeach

                            @else
                                @foreach (json_decode($question->body) as $body)
                                <div class="col-md-4 m-auto">
                                    @if ($loop->iteration == 1)
                                        <div class=" text-center">
                                    @else
                                        <div class="border-left-dark text-center">
                                    @endif
                                        <input class="text-center  form-control" type="checkbox" value="">
                                        <label class="text-center form-check-label" for="">
                                            {{$body}}
                                        </label>
                                    </div>
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


@endsection
