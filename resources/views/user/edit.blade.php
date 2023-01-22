@extends('layouts.layout')
@section('title')
Edit User
@endsection
@section('css')
<!-- Custom styles for this page -->
<style>
    .eye-icon {
        color: gainsboro;
        transition: 0.3s ease-in-out;
    }

      .eye-icon:hover {
        color: darkblue;
    }
</style>
@endsection


@section('content')

@section('head-title')
Edit <span class="font-weight-bolder text-capitalize">{{ $user->name }}</span> informations
@endsection

<div class="row m-auto">


    <div class="col-md-10 col-xs-12 m-auto">
        <a class="btn btn-dark btn-sm  my-1 float-lg-right" href="{{ url('users', []) }}">Back</a>
    </div>
    <div class="col-md-10 col-xs-12 m-auto">

            <form action="{{url('update-user' , [])}}" method="post">
                @csrf
                <input type="hidden" name="customer_id" value="{{$user->id}}">
                <table class="table table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row">Email</th>
                            <td>
                                <input type="text" name="email" value="{{ $user->email }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Name</th>
                            <td>
                                <input type="text" name="name" value="{{ $user->name }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Phone</th>
                            <td>
                                <input type="text" name="phone" value="{{ $user->phone }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Gender</th>
                            <td>
                                <select name="gender" class="form-control">
                                    <option
                                        @if ($user->gender == "male" || $user->gender = "Male")
                                            selected
                                        @endif
                                        value="Male">Male</option>
                                    <option
                                        @if ($user->gender == "female" || $user->gender = "Female")
                                            selected
                                        @endif
                                        value="Female">Female</option>
                                </select>

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Workout Intensity</th>
                            <td>
                                <input type="text" name="workout_intensity" value="{{ $user->workout_intensity }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Age</th>
                            <td>
                                <input type="text" name="age" value="{{ $user->age }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Height</th>
                            <td>
                                <input type="text" name="height" value="{{ $user->height }}" class="form-control">

                            </td>
                        </tr>
                        <tr>
                            <th scope="row">Exercise Days</th>
                            <td>
                                <input type="text" name="exercise_days" value="{{ $user->exercise_days }}" class="form-control">

                            </td>
                        </tr>

                        <tr>
                            <th scope="row">Change Password ?
                                <br>
                                <small>
                                        Please left it
                                        <span class="font-weight-bolder"> Empty </span>
                                         if you
                                         <span class="font-weight-bolder"> DON'T</span>
                                         need to change it</small>

                            </th>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="password" name="password" value="{{old('password')}}" class="form-control form-control-user"
                                    id="password1" placeholder="New Password">
                                    <div class="input-group-append">
                                      <button class="btn btn-info" type="button" id="button-addon2">
                                        <a href="javascript:showPassword1()"> <i class="fa fa-eye eye-icon" ></i> </a>
                                      </button>
                                    </div>
                                </div>

                                <div class="input-group mb-3">
                                    <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" class="form-control form-control-user"
                                    id="password2" placeholder="Confirm Password">
                                    <div class="input-group-append">
                                      <button class="btn btn-info" type="button" id="button-addon2">
                                        <a href="javascript:showPassword2()"> <i class="fa fa-eye eye-icon" ></i> </a>
                                      </button>
                                    </div>
                                </div>

                            </td>
                        </tr>


                        <tr >
                            <td colspan="2" class="m-auto text-center">
                                    <input type="submit"  class="btn btn-info" title="Update" value="Update">
                            </td>
                        </tr>

                    </tbody>
                </table>
            </form>

    </div>
</div>




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
