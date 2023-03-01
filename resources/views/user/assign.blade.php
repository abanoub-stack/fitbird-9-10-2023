@extends('layouts.layout')
@section('title')
Assign Subscription To User
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
Assign Subscription To User
@endsection
        <div class="row">

            <div class="col-md-6 offset-md-3">
                <h5 class="mb-3">Select User and his Plan</h5>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('/users/premium/assign', []) }}">
                            @csrf

                            <div class="form-group">
                                <label>User :</label>
                                <select name="customer_id" class="form-control text-dark text-center" id="">
                                    @foreach (DB::table('customers')->orderBy('name' , 'asc')->get() as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }} | {{ $user->email }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Subscription Type :</label>
                                <select name="subscription_type" class="form-control text-dark text-center" id="">
                                    <option value="month">Month</option>
                                    <option value="three_months">Three Months</option>
                                    <option value="six_months">Six Months</option>
                                    <option value="year">Year</option>
                                </select>
                            </div>

                            <div class="text-center mt-5">
                                <button type="submit" class="btn btn-primary">Submit</button>
                                <a class="btn btn-dark" href="{{ url('/users/premium', []) }}">Back</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
@endsection
