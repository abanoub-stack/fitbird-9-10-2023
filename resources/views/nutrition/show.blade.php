@extends('layouts.layout')
@section('title')
    Show Nutrition
@endsection
@section('content')
@section('head-title')
Show Nutrition "{{$nutrtion->title}}"
@endsection
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <a href="{{url('nutrition')}}" class="btn btn-outline-dark float-lg-right m-2">Back</a>

                <div class="card border-primary">
                  <div class="card-body" style="background-color: #111832">
                    <h4 class="card-title">{{$nutrtion->title}}</h4>
                    <hr>
                    <p class="card-text">
                        {!! $nutrtion->data !!}
                    </p>
                  </div>
                </div>


            </div>
        </div>
@endsection
