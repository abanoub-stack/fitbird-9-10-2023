@extends('layouts.layout')
@section('title')
Add Admin
@endsection
@section('content')

@section('head-title')
Admins
@endsection

<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-8 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4"> Add New Admin</h1>
                                </div>


                                <form class="user" method="POST" action="{{ url('/admins/add', []) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" autofocus class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" name="email" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Currency</label>
                                        <input type="text" name="currency" value="EG" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" name="password" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Confirm Password</label>
                                        <input type="password" name="password_confirmation" class="form-control">
                                    </div>


                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Add</button>
                                        <a class="btn btn-dark" href="{{ url('admins', []) }}">Back</a>
                                    </div>
                                </form>


                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

</div>


@endsection
