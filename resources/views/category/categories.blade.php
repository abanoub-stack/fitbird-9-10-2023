@extends('layouts.layout')
@section('title')
     Categories
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
All Categories
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Categories</h6>
        <div class="float-right">
            <a href="{{ url('add-category') }}" class="btn btn-success">
                Add Category
            </a>
        </div>
        <div class="d-flex justify-content-between align-items-center mt-3">
            <form method="GET" action="{{ url('categories/search') }}">
                <input class="form-control" type="text" name="keyword" placeholder="Search..."
                    @if (request()->has('keyword')) value="{{ request()->get('keyword') }}" @endif>
                <br>
            </form>
        </div>
    </div>
    <div class="card-body">
        {{-- Alerts --}}
            <div class="text-center">
                @if (request()->session()->has('category_added_successfully'))
                    <div class="text-success">
                        <h5>{{ request()->session()->remove('category_added_successfully') }}</h5>
                    </div>
                @endif
                @if (request()->session()->has('category_deleted_successfully'))
                    <div class="text-danger">
                        <h5>{{ request()->session()->remove('category_deleted_successfully') }}</h5>
                    </div>
                @endif
                @if (request()->session()->has('category_updated_successfully'))
                    <div class="text-primary">
                        <h5>{{ request()->session()->remove('category_updated_successfully') }}</h5>
                    </div>
                @endif
            </div>
        {{-- Alerts --}}




        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Parent</th>
                            <th>Description</th>
                            <th>Level</th>
                            <th>Icons</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th colspan="6"><div class="d-flex justify-content-center">{{ $categories->links() }}</div></th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($categories as $i => $cat)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $cat->name }}</td>
                                @if ($cat->subCategory != null)
                                    <td>
                                        <a href="{{ url('edit-category', $cat->parent_id) }}">
                                            {{ $cat->subCategory->name }}
                                        </a>
                                    </td>
                                @else
                                    <td>No Parent</td>
                                @endif

                                <td style="width: 30%">{{ $cat->description }}</td>
                                <td>{{ $cat->level }}</td>
                                <td><a class="m-auto" href="{{ asset('uploads/' . $cat->icon) }}" target="_blank"><img class="m-auto"
                                            src="{{ asset('uploads/' . $cat->icon) }}" style="height: 90px ; object-fit: contain"
                                            alt=""></a></td>
                                {{-- <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('edit-category', $cat->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-category', $cat->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td> --}}

                                <td>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <a href="{{ url('edit-category', $cat->id) }}" class="btn text-primary">
                                                <i class="fa fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-6">
                                            <a href="{{ url('delete-category', $cat->id) }}" class="btn text-danger">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        </div>
                                    </div>


                                </td>
                            </tr>
                        @endforeach
                    </tbody>
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


