@extends('layouts.layout')
@section('title')
     Profile
@endsection
@section('content')

@section('head-title')
Edit Profile
@endsection

<style>
    .eye-icon {
        color: whitesmoke;
    }
</style>


<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg my-5">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-8 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">{{Auth::user()->name}}</h1>
                                </div>

                                <div class="errors">
                                    @include('layouts.errors')
                                </div>
                                <form class="user" action="{{ url('profile', []) }}" method="POST">
                                    @csrf

                                    <div class="form-group">
                                        <input type="text" value="{{ $admin->name }}" name="name" class="form-control form-control-user"
                                            id="exampleInputname" aria-describedby="emailHelp"
                                            placeholder="Enter Your Name...">
                                    </div>

                                    <div class="form-group">
                                        <input type="email" value="{{ $admin->email }}" name="email" class="form-control form-control-user"
                                            id="exampleInputEmail" aria-describedby="emailHelp"
                                            placeholder="Enter Email Address...">
                                    </div>


                                    <div class="card p-4 shadow-lg">
                                        <label>Change Password ? </label>

                                        <div class="input-group mb-3">
                                            <input type="password" name="password" class="form-control form-control-user"
                                            id="password1" placeholder="New Password">
                                            <div class="input-group-append">
                                              <button class="btn btn-info" type="button" id="button-addon2">
                                                <a href="javascript:showPassword1()"> <i class="fa fa-eye eye-icon" ></i> </a>
                                              </button>
                                            </div>
                                        </div>

                                        <div class="input-group mb-3">
                                            <input type="password" name="password_confirmation" class="form-control form-control-user"
                                            id="password2" placeholder="Confirm Password">
                                            <div class="input-group-append">
                                              <button class="btn btn-info" type="button" id="button-addon2">
                                                <a href="javascript:showPassword2()"> <i class="fa fa-eye eye-icon" ></i> </a>
                                              </button>
                                            </div>
                                        </div>

                                    </div>


                                    <div class="btns mt-5 text-center">
                                        <div class="form-group d-inline">
                                            <button type="submit" class="btn btn-primary btn-user">Update</button>
                                        </div>

                                        <div class="form-group d-inline">
                                            <a  href="{{ url('/', []) }}" class="btn btn-secondary btn-user">Back</a>
                                        </div>
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

<script>
    function showPassword1() {
        var x = document.getElementById("password1");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }

    function showPassword2() {
        var x = document.getElementById("password2");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>
