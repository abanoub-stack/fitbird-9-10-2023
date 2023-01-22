@extends('layouts.main')
@section('title')
    Questions
@endsection
@section('main')
<style>

    /* include Google Web fonts: */
    @import url('https://fonts.googleapis.com/css?family=Meie+Script|Shadows+Into+Light|Arvo|Monda');



    .font_meie_script {
    font-family: 'Meie Script', cursive;
    }

    .font_shadows_into_light {
    font-family: 'Shadows Into Light', cursive;
    }

    .font_arvo {
    font-family: 'Arvo', serif;
    font-style: italic;
    font-weight: 400;
    }


    .font_monda {
    font-family: 'Monda', sans-serif;
    }


    .card {
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.356);
    border-radius: 15px; }
    .form-check{
        margin-top: 10px;
        margin-bottom: 10px;
        border: 2px solid black;
        font-family: 'Arvo', serif;
        font-weight: 400;
        font-size: 16px;
        padding: 5px;
        background-color: rgba(0, 0, 0, 0.021);
        transition: 0.2s ease-in-out;
    }

    .form-check:hover{
        background-color: #222222;
        color: whitesmoke;
        transition: 0.3s ease-in-out;
    }

    input[type=radio] {
        color: black;
    }

</style>

<div class="container-fluid  py-5">
    <div class="row">

        <div class="col-md-10 offset-md-1">


            {{-- Page Title --}}
            <div class="row">
                <div class="col-12">
                    <h3 class="mb-5">Show Question  "{{$question->title}}"</h3>

                                {{-- Page Title --}}
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
                                            <div class="col-md-4 m-auto">
                                                <div class="text-center form-check custom-control custom-radio">
                                                    <input class="text-center"   type="radio" name="choice">
                                                    <label class="text-center" for="">
                                                        {{$body}}
                                                    </label>
                                                </div>
                                            </div>
                                        @endforeach

                                    @else
                                        @foreach (json_decode($question->body) as $body)
                                        <div class="col-md-4 m-auto">
                                            <div class="text-center form-check">
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


        </div>

    </div>
</div>
@endsection
