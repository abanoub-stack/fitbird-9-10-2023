@extends('layouts.layout')
@section('title')
Edit Admin {{ $admin->name }}
@endsection
@section('content')

@section('head-title')
Admins
@endsection

<!-- Outer Row -->
<div class="row justify-content-center">

        <div class="col-xl-12 col-lg-12 col-md-9">

            <div class="card o-hidden border-0 shadow-lg ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        {{-- <div class="col-lg-6 d-none d-lg-block bg-login-image"></div> --}}
                        <div class="col-lg-8 m-auto">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">    Edit Admin <span class="text-primary">{{ $admin->name }}</span></h1>
                                </div>


                                <form class="user" method="POST" action="{{ url('admins/edit', [$admin->id]) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" value="{{ $admin->name }}" name="admin_name" class="form-control">
                                    </div>


                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" value="{{ $admin->email }}" name="admin_email" class="form-control">
                                    </div>

                                    @if (auth()->user()->role == 'SUPER_ADMIN')
                                        <div class="form-group">
                                            <label>Role</label>
                                            <select name="admin_role" class="form-control" id="role">
                                                <option value="ADMIN">Admin</option>
                                                <option value="SUPER_ADMIN">Super Admin</option>
                                            </select>
                                        </div>
                                    @endif

                                    <div class="form-group">
                                        <div class="mt-4 p-2 rounded" style="background-color: rgba(110, 110, 110, 0.199)">
                                            <label>Password</label>
                                            <input type="password" name="admin_password" class="form-control">
                                            <small class="text-dark">*Change Password</small>
                                        </div>
                                    </div>
                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Update</button>
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
