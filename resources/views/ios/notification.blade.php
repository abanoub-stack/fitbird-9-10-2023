@extends('layouts.main')
@section('title')
    IOS Key
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">IOS Key</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('update-ios') }}">
                            @csrf
                            <div class="form-group">
                                <label>Key</label>
                                <input type="text" value="{{ $key->ios_key }}" name="ios_key" class="form-control">
                            </div>
                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
