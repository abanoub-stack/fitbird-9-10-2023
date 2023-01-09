@extends('layouts.main')
@section('title')
    Edit Admin {{ $admin->name }}
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Edit Admin {{ $admin->name }}</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('admins/edit', [$admin->id]) }}">
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
                                <div class="mt-4 pb-1 rounded" style="background-color: rgba(110, 110, 110, 0.199)">
                                    <label>Password</label>
                                    <input type="password" name="admin_password" class="form-control">
                                    <small class="text-dark">*Change Password</small>
                                </div>
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
