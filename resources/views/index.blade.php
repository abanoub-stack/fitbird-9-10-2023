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

            {{-- Users Progress --}}
            <div class="col-12 m-auto my-5">
                <div class="row m-auto">
                    <div class="col-lg-10 col-md-12 m-auto">
                        {{-- Table --}}
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th scope="col">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Days Remaining</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center">
                                    @foreach ($pre_users as $i => $user)
                                        <tr>
                                            <th scope="row">{{ $i + 1 }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                        @php
                                                            $percent = floor((\Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now())/$user->getSubInDays()) * 100)
                                                        @endphp
                                                        <div class="progress">
                                                            <div class="progress-bar  px-5
                                                                @if($percent > 80)
                                                                bg-success
                                                                @elseif($percent < 80 && $percent > 40)
                                                                bg-warning
                                                                @elseif($percent < 14)
                                                                bg-danger
                                                                @endif
                                                                " role="progressbar"
                                                                style="width:{{$percent}}%"
                                                                aria-valuenow="{{ \Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now() ) }}"
                                                                aria-valuemin="0"
                                                                aria-valuemax="{{$user->getSubInDays()}}">
                                                                {!! '<span class="font-weight-bold ">' . \Carbon\Carbon::parse($user->subscription_finished_at)->diffInDays( now()) . ' days </span>  ' !!}
                                                            </div>
                                                        </div>
                                            </td>
                                            <td>
                                                <a class="text-primary mx-1" href="{{ url('user', $user->id) }}">
                                                   <button class="btn btn-sm btn-outline-dark rounded">
                                                        More Info <i class="fa fa-eye"> </i>
                                                   </button>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        @if (Route::current()->uri=="users")
                                            <th colspan="11"><div class="d-flex justify-content-center">{{ $users->links() }}</div></th>
                                        @endif
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        {{-- Table --}}
                    </div>
                </div>
            </div>




</div>


@endsection
