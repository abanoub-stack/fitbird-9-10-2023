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
                        <h3>Add Question Body</h3>

                    </div>
                </div>
                {{-- Page Title --}}


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
                        @if ($question->type == "field")
                            <input type="text" value="{{old('body')}}" name="body"  class="form-control" placeholder="Question Body">
                        @elseif ($question->type == "area")
                            <textarea
                                type="text" name="body"  class="form-control" placeholder="Question Body"
                                >@if(old('body') != null){{old('body')}}
                                @else{{$question->body}}@endif
                            </textarea>

                        {{-- Will take array --}}
                        @elseif ($question->type == "single" || $question->type == "multiple")

                        @for($i = 1; $i <= $question->choice_number; $i++)
                            <div class="mb-3">
                                <input type="text"
                                @if(old('body') != null)
                                    value="{{old('body')}}"
                                @else
                                    value="{{json_decode($question->body)[$i - 1]}}"
                                @endif
                                 name="body[]"  class="form-control" placeholder="Question Choice {{$i}} ">
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

                        <button type="submit" class="btn btn-primary">Update Body</button>

                        </form>

                    </div>
                </div>


            </div>

        </div>
    </div>
@endsection
