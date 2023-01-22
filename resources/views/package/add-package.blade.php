@extends('layouts.layout')
@section('title')
Packages
@endsection
@section('content')

@section('head-title')
Add Package
@endsection

<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-10 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">Add New Package</h1>
                                </div>

                                <form class="user" method="POST" action="{{ url('/packages/add', []) }}">
                                    @csrf

                                    <div class="form-group">
                                        <label>Package Name</label>
                                        <input type="text" name="name" class="form-control">
                                    </div>

                                    <hr class="container-fluid">

                                    <div class="form-group">
                                        <label>Premium User</label>
                                        <select id="selUser" class="form-control" name="customer">
                                            @foreach (DB::table('customers')->where('is_subscribed', '=', 1)->get() as $customer)
                                                @php
                                                    $userPackages = DB::table('packages')
                                                        ->where('customer_id', '=', $customer->id)
                                                        ->get();
                                                @endphp
                                                @if ($userPackages->count() <= 0)
                                                    <option value="{{ $customer->id }}">({{ $customer->name }} |
                                                        {{ $customer->phone }})
                                                    </option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <hr class="container-fluid">
                                    <hr class="container-fluid">

                                    <div class="form-group text-left">
                                        <label>Exercise</label>

                                            <div class="input-group mb-5">
                                                <input type="text" class="input form-control" placeholder="Search" id="search">
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" disabled type="button" id="button-addon2">
                                                            <i class="fa fa-search" aria-hidden="true"></i>
                                                    </button>
                                                </div>
                                            </div>

                                            <div class="row " id="checkboxes2" >
                                                @foreach (DB::table('exercises')->orderBy('name' , 'asc')->get() as $ex)
                                                    <div class="search-col col-md-4 col-xs-12 mb-1">
                                                            <input type="checkbox" id="{{ $ex->name }}" name="{{ 'exercise_' . $ex->id }}"> {{ $ex->name }}
                                                            <hr>
                                                    </div>
                                                @endforeach
                                            </div>

                                    </div>


                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-dark" href="{{ url('packages', []) }}">Back</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>


<script>
    const search = document.getElementById("search");
    const labels = document.querySelectorAll("#checkboxes2 > div.search-col");
    console.log(labels);
    search.addEventListener("input", () => Array.from(labels).forEach((element) => element.style.display = element.childNodes[1].id.toLowerCase().includes(search.value.toLowerCase()) ? "inline" : "none"))
</script>

@endsection


