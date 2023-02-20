@extends('layouts.layout')
@section('title')
Training Layouts
@endsection
@section('content')
@section('head-title')
Edit {{$layout->name}}
@endsection

        <div class="row">

            <div class="col-md-10 offset-md-1">


                <div class="row">
                    <div class="col-lg-6 m-auto">

                        <div class="card">
                          <div class="card-body">
                              <form action="{{route('day-layouts.update')}}" method="post" >
                                  @csrf
                                  <input type="hidden" name="section_id" value="{{$layout->id}}">
                                  <div class="mb-3">
                                      <label for="" class="form-label">Edit {{$layout->name}}</label>
                                      <input type="text"   name="section_name" value="{{$layout->name}}"  class="form-control" placeholder="example: Warm Up" >
                                      @error('section_name')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <button type="submit" class="btn btn-success float-lg-right">Update</button>

                              </form>
                          </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
@endsection
