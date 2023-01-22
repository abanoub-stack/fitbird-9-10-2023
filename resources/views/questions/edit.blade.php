@extends('layouts.layout')
@section('title')
    Questions
@endsection
@section('content')
@section('head-title')
Edit Questions ({{$question->title}})
@endsection
        <div class="row">

            <div class="col-md-10 offset-md-1">

                <div class="row">
                    <div class="col-lg-6 m-auto">


                        <div class="card" >
                          <div class="card-body">
                            <form action="{{route('question.update')}}" method="post">
                                @csrf

                                <input type="hidden" name="id"  value="{{$question->id}}">
                                <div class="mb-3">
                                    <label for="" class="form-label">Title</label>
                                    <input type="text" value="{{$question->title}}" name="title"  class="form-control" placeholder="Question Title">
                                    <small class="text-muted">Enter Question Title</small>
                                    @error('title')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Description</label>
                                    <input type="text" value="{{$question->description}}" name="description"  class="form-control" placeholder="Question description">
                                    <small class="text-muted">You Can Left it Empty</small>
                                    @error('description')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Type</label>
                                    <select name="type" class="form-control">
                                        <option selected disabled value="">Select one</option>
                                        <option
                                                @if ($question->type == "field") selected @endif
                                        value="field">Text Field</option>
                                        <option
                                                @if ($question->type == "area") selected @endif
                                        value="area">Text Area</option>
                                        <option
                                                @if ($question->type == "single") selected @endif
                                        value="single">Single Choice</option>
                                        <option
                                                @if ($question->type == "multiple") selected @endif
                                        value="multiple">Multiple Choice</option>
                                    </select>
                                    @error('type')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>


                                <div class="mb-3">
                                    <label for="" class="form-label">Choice Number</label>
                                    <input type="number" min="0" value="{{$question->choice_number}}" name="choice_number"  class="form-control" placeholder="It's required with (multiple , single)">
                                    <small class="text-muted">It's required with (multiple , single) questions type</small>
                                    @error('choice_number')
                                        <span class="invalid-feedback text-danger" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <button type="submit" class="btn btn-primary float-lg-right">Continue</button>

                            </form>
                          </div>
                        </div>


                    </div>
                </div>


            </div>

        </div>
@endsection
