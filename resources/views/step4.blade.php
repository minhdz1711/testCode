@extends('layouts')

@section('content')
    <div class="card">
        <div class="card-header">
            <h3>Order Food - Step 4</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-4">
                    <h5 class="card-title">Restaurant</h5>
                    @isset($data_result['restaurant'])
                        <input readonly class="form-control" aria-describedby="basic-addon2"
                            value="{{ $data_result['restaurant'] }}">
                    @endisset

                </div>

                <div class="col-4">
                    <h5 class="card-title">Meal</h5>
                    @isset($data_result['meal'])
                        <input readonly class="form-control" aria-describedby="basic-addon2" value="{{ $data_result['meal'] }}">
                    @endisset

                </div>

                <div class="col-4">
                    <h5 class="card-title">Quantity People</h5>
                    @isset($data_result['meal'])
                        <input readonly class="form-control" aria-describedby="basic-addon2"
                            value="{{ $data_result['quantity_people'] }}">
                    @endisset

                </div>

                <div class="col-12">
                    <h5 class="card-title">Food</h5>
                    @isset($data_result['foods'])
                        @foreach ($data_result['foods'] as $food)
                            <div class="row" style="margin-bottom: 15px">
                                <div class="col-6">
                                    <input readonly class="form-control" aria-describedby="basic-addon2"
                                        value="{{ $food['food'] }}">
                                </div>
                                <div class="col-6">
                                    <div class="input-group mb-3">
                                        <input readonly type="number" class="form-control" placeholder="Quantity"
                                            aria-label="quantity" aria-describedby="basic-addon2"
                                            value="{{ $food['quantity'] }}">
                                        <span class="input-group-text" id="basic-addon2">portion</span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endisset

                </div>

            </div>
        </div>
    </div>

    <div style="margin-top: 20px" class="row">
        <div class="col-6">
            <a href="{{ route('food-order.postStepThree')}}" type="button" class="btn btn-primary">Left</a>
        </div>
        <div class="col-6" style="text-align: end !important">
            <a href="{{route('food-order.viewStepSuccess')}}" type="submit" class="btn btn-primary">Next</a>
        </div>
    </div>

@endsection
