@extends('layouts.layout')
@section('title')
Training Sections
@endsection
@section('content')
@section('head-title')
Add new  section
@endsection

        <div class="row">

            <div class="col-md-10 offset-md-1">


                <div class="row">
                    <div class="col-lg-6 m-auto">

                        <div class="card">
                          <div class="card-body">
                              <form action="{{route('tsection.store')}}" method="post" >
                                  @csrf
                                  <div class="mb-3">
                                      <label for="" class="form-label">Add Section Name</label>
                                      <input type="text" required  value="{{old('section_name')}}" name="section_name"  class="form-control" placeholder="example: Warm Up" >
                                      @error('section_name')
                                          <span class="invalid-feedback text-danger" role="alert">
                                              <strong>{{ $message }}</strong>
                                          </span>
                                      @enderror
                                  </div>

                                  <button type="submit" class="btn btn-primary float-lg-right">Add</button>

                              </form>
                          </div>
                        </div>

                    </div>
                </div>


            </div>

        </div>
@endsection
