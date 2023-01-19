@extends('layouts.layout')
@section('title')
Edit Set
@endsection
@section('content')

@section('head-title')
Sets
@endsection

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
                                    <h1 class="h4 text-gray-900 mb-4">Edit Set</h1>
                                </div>

                                <form class="user" method="POST" action="{{ url('edit-set', $set->id) }}">
                                    @csrf
                                    <div class="form-group">
                                        <label>Category</label>
                                        <select class="form-control" name="category">
                                            @foreach (DB::table('categories')->get() as $cat)
                                                @if ($set->Category->id == $cat->id)
                                                    <option value="{{ $cat->id }}" selected>{{ $cat->name }}
                                                @endif
                                                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Exercise</label>
                                        <select class="form-control" name="exercise">
                                            @foreach (DB::table('exercises')->get() as $exercise)
                                                @if ($set->Exercise->id == $exercise->id)
                                                    <option value="{{ $exercise->id }}" selected>{{ $exercise->name }}</option>
                                                @endif
                                                <option value="{{ $exercise->id }}">{{ $exercise->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="text-center mt-5">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="btn btn-dark" href="{{ url('/sets', []) }}">Back</a>
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
