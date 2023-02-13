@extends('layouts.layout')
@section('title')
Users
@endsection
@section('css')
<!-- Custom styles for this page -->
@endsection


@section('content')

@section('head-title')
All Users
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Users</h6>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <form method="GET" action="{{ url('search-users/search') }}">
                <input class="form-control" type="text" name="keyword" placeholder="Search..."
                    @if (request()->has('keyword')) value="{{ request()->get('keyword') }}" @endif>
                <br>
            </form>
        </div>
    </div>
    <div class="card-body">

        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Email</th>
                            <th scope="col">Name</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Gender</th>
                            <th scope="col">Workout Intensity</th>
                            {{-- <th scope="col">Age</th> --}}
                            {{-- <th scope="col">Height</th> --}}
                            {{-- <th scope="col">Exercise Days</th> --}}
                            <th scope="col">Payment Status</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $i => $user)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->phone }}</td>
                                <td>{{ $user->gender }}</td>
                                <td>{{ $user->workout_intensity }}</td>
                                {{-- <td>{{ $user->age }}</td> --}}
                                {{-- <td>{{ $user->height }}</td> --}}
                                {{-- <td>{{ $user->exercise_days }}</td> --}}
                                @if ($user->is_subscribed == '1')
                                    <td class="text-success"><strong>{{ 'User Subscribed' }}</strong></td>
                                @else
                                    <td class="text-danger"><strong>{{ 'User Not Subscribed' }}</strong></td>
                                @endif
                                <td>
                                    <a class="text-primary mx-1" href="{{ url('user', $user->id) }}">
                                        <i class="fa fa-eye"></i>
                                    </a>

                                    <a class="text-dark mx-1" href="{{ url('edit-user', $user->id) }}">
                                        <i class="fa fa-pen"></i>
                                    </a>

                                    <a class="text-danger mx-1" href="{{ url('delete-user', $user->id) }}">
                                        <i class="fa fa-trash"></i>
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



@endsection

<!-- Page level plugins -->
<script src="{{asset('dashboard/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>

<!-- Page level custom scripts -->
<script src="{{asset('dashboard/js/demo/datatables-demo.js')}}"></script>


