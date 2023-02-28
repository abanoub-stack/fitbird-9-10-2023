@extends('layouts.layout')
@section('title')
    Banner Control
@endsection
@section('content')
@section('head-title')
Add New Banner Image
@endsection

        <div class="row">

            <div class="col-md-10 offset-md-1">


                <div class="row">
                    <div class="col-lg-6 m-auto">

                        <div class="card">
                          <div class="card-body">
                              <form action="{{route('banner.store')}}" method="post" enctype="multipart/form-data">
                                  @csrf
                                  <div class="mb-3">
                                      <label for="" class="form-label">Select Image</label>
                                      <input type="file" required  name="image"  class="form-control" >
                                      <small class="text-muted">Select Image of type (jpg-png-jpeg-gif)</small>
                                      @error('image')
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
