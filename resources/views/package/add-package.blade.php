@extends('layouts.main')
@section('title')
    Add Package
@endsection
@section('main')
    <div class="container py-5">
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Add Package</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('/packages/add', []) }}">
                            @csrf

                            <div class="form-group">
                                <label>Package Name</label>
                                <input type="text" name="name" class="form-control">
                            </div>

                            <hr class="container-fluid">

                            <div class="form-group">
                                <label>User</label>
                                <select id="selUser" class="form-control" name="customer">
                                    @foreach (DB::table('customers')->get() as $customer)
                                        <option value="{{ $customer->id }}">({{ $customer->name }} | {{ $customer->phone }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <hr class="container-fluid">
                            <hr class="container-fluid">
                            <div class="form-group text-left">
                                <label>Exercise</label>
                                <br>
                                @foreach (DB::table('exercises')->get() as $ex)
                                    <input type="checkbox" name="{{ 'exercise_' . $ex->id }}"> {{ $ex->name }}
                                    <br>
                                @endforeach
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
@endsection
