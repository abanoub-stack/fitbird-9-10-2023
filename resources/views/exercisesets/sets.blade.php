@extends('layouts.layout')
@section('title')
Exercise Sets
@endsection
@section('css')
<!-- Custom styles for this page -->
<link href="{{asset('dashboard/vendor/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
@endsection


@section('content')

@section('head-title')
All Sets
@endsection



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">All Sets</h6>
        <div class="float-right">
            <a href="{{ url('add-set', []) }}" class="btn btn-success">
                Add Set
            </a>
        </div>
    </div>
    <div class="card-body">

        {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <tfoot>
                        <tr>
                            <th colspan="4"><div class="d-flex justify-content-center">{{ $sets->links() }}</div></th>
                        </tr>
                    </tfoot>
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Category Name</th>
                            <th scope="col">Exercise Name</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sets as $i => $set)
                            <tr>
                                <th scope="row">{{ $i + 1 }}</th>
                                <td>{{ $set->Category->name ?? '' }}</td>
                                <td>{{ $set->Exercise->name ?? '' }}</td>
                                <td>
                                    <a class="btn btn-sm btn-info" href="{{ url('edit-set', $set->id) }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a class="btn btn-sm btn-danger" href="{{ url('delete-set', $set->id) }}">
                                        <i class="fas fa-trash"></i>
                                    </a>
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


