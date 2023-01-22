@extends('layouts.layout')
@section('title')
    Questions
@endsection
@section('content')
@section('head-title')
Add Question Body
@endsection
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="row">
                    <div class="col-lg-6 m-auto">

                        <form action="{{route('question.update.body')}}" method="post">
                        @csrf
                        <input type="hidden" name="id" value="{{$question->id}}">

                        <div class="mb-3">
                            <label for="" class="form-label">Title</label>
                            <input type="text" value="{{$question->title}}" disabled name="title"  class="form-control" placeholder="Question Title">
                        </div>

                        <div class="mb-3">
                            <label for="" class="form-label">Type</label>
                            <input type="text" value="{{$question->type}}" disabled name="type"  class="form-control" placeholder="Question Title">
                        </div>

                        @if ($question->type == "single" || $question->type == "multiple")
                        <div class="mb-3">
                            <label for="" class="form-label">Choice Number</label>
                            <input type="text" value="{{$question->choice_number}}" disabled name="choice_number"  class="form-control" placeholder="Question Title">
                        </div>
                        @endif


                        <div class="mb-3">
                        <label for="" class="form-label">Body</label>

                                @if($question->type == "field" || $question->type == "area")
                                    <div>
                                        No Body For This Type Of Questions
                                    </div>

                                {{-- Will take array --}}
                                @elseif ($question->type == "single" || $question->type == "multiple")
                                        @for($i = 1; $i <= $question->choice_number; $i++)
                                            <div class="mb-3">
                                                <input type="text"
                                                    @if(isset(json_decode($question->body)[$i - 1]))
                                                        value="{{json_decode($question->body)[$i - 1]}}"
                                                    @else
                                                        value = ""
                                                    @endif
                                                    name="body[]" required class="form-control" placeholder="Question Choice {{$i}} ">
                                            </div>
                                        @endfor
                                @endif





                            <small class="text-muted">Enter Question body</small>
                            @error('body')
                                <span class="invalid-feedback text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary float-lg-right">Update Body</button>

                        </form>

                    </div>
                </div>


            </div>

        </div>
@endsection
