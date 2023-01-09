@extends('layouts.main')
@section('title')
    Subscription Price
@endsection
@section('main')
    <div class="container-fluid py-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h3 class="mb-3">Subscription Price</h3>
                <div class="card">
                    <div class="card-body p-5">
                        @include('layouts.errors')
                        <form method="POST" action="{{ url('price') }}">
                            @csrf
                            <div class="form-group">
                                <label><strong>1 Month</strong></label>
                                <input type="text" value="{{ $price->price }}" placeholder="{{ $price->price }}"
                                    name="price" class="form-control text-center">
                            </div>
                            <div class="form-group">
                                <label><strong>3 Months Price</strong></label>
                                <input type="text" name="price_three_months" value="{{ $price->price_three_months }}"
                                    placeholder="{{ $price->price_three_months }}" class="form-control text-center">
                            </div>
                            <div class="form-group">
                                <label><strong>6 Months Price</strong></label>
                                <input type="text" name="price_six_months" value="{{ $price->price_six_months }}"
                                    placeholder="{{ $price->price_six_months }}" class="form-control text-center">
                            </div>
                            <div class="form-group">
                                <label><strong>1 Year Price</strong></label>
                                <input type="text" name="price_year" value="{{ $price->price_year }}"
                                    placeholder="{{ $price->price_year }}" class="form-control text-center">
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
