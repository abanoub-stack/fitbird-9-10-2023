@extends('layouts.layout')
@section('title')
    Main
@endsection
@section('content')

@section('head-title')
    Dashboard
@endsection
<style>
    .index-links , .index-links div , .index-links:hover
    {
        text-decoration: none;
    }
</style>
<!-- Content Row -->
<div class="row">

            <!-- Categoires Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="index-links" href="{{ url('/categories', []) }}">
                    <div class="card border-left-primary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                        Total Exercise Category
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('categories')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total Exercise Item Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="index-links" href="{{ url('/exercises', []) }}">
                    <div class="card border-left-success shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                        Total Exercise Item
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('exercises')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>


            <!-- Total Push Sent Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="index-links" href="{{ url('/send-notifications', []) }}">
                    <div class="card border-left-warning shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                        Total Push Sent
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('notifications')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Total App Users Card  -->
            <div class="col-xl-3 col-md-6 mb-4">
                <a class="index-links" href="{{ url('/users', []) }}">
                    <div class="card border-left-secondary shadow h-100 py-2">
                        <div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-xs font-weight-bold text-secondary text-uppercase mb-1">
                                        Total App Users
                                    </div>
                                    <div class="h5 mb-0 font-weight-bold text-gray-800">{{ DB::table('customers')->count() }}</div>
                                </div>
                                <div class="col-auto">
                                    <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </a>
            </div>

</div>


@endsection
