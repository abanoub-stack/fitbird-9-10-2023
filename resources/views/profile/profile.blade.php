@extends('layouts.main')
@section('title')
    Profile
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Profile</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('profile', []) }}">
                            @csrf
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" value="{{ $admin->name }}" name="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" value="{{ $admin->email }}" name="email" class="form-control">
                            </div>
                            <div class="container-fluid rounded" style="background-color: rgb(245, 237, 237)">

                                <div class="form-group mt-5">
                                    <label>New Password</label>
                                    <input type="password" value="" id="password1" name="password"
                                        class="form-control">
                                    <input class="form-check-label" type="checkbox" onclick="showPassword1()"> Show
                                    Password
                                </div>
                                <div class="form-group mt-5">
                                    <label>Confirm Password</label>
                                    <input type="password" value="" id="password2" name="password_confirmation"
                                        class="form-control">
                                    <input class="form-check-label" type="checkbox" onclick="showPassword2()"> Show
                                    Password
                                </div>

                                <small>*fill password section if you wanna change password</small>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a class="btn btn-dark" href="{{ url('/', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
@section('js')
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
@endsection
