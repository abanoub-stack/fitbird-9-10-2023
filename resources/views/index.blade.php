@extends('layouts.main')
@section('title')
    Main
@endsection
@section('main')
    <div class="container-fluid py-5">
        <h3 class="text-center"><span class="text-primary">D</span>ash<span class="text-danger">B</span>oar<span
                class="text-warning">d</span></h3>
        <br>
        <br>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Total Exercise Category</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ DB::table('categories')->count() }}</h5>
                            <a href="{{ url('/categories', []) }}" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white mb-3" style="background-color: tomato">
                    <div class="card-header">Total Exercise Item</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ DB::table('exercises')->count() }}</h5>
                            <a href="{{ url('exercises', []) }}" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Push Sent</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ DB::table('notifications')->count() }}</h5>
                            <a href="{{ url('send-notifications', []) }}" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total App Users</div>
                    <div class="card-body">
                        <div class="card-text d-flex justify-content-between align-items-center">
                            <h5>{{ DB::table('customers')->count() }}</h5>
                            <a href="{{ url('users', []) }}" class="btn btn-light">Show</a>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
