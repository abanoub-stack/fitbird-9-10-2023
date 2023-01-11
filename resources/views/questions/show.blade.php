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

                    </div>
                </div>
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
    </div>
@endsection
