@extends('layouts')

@section('content')
    <form method="POST" action="{{ route('food-order.postStepTwo') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Order Food - Step 2</h3>
            </div>
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-6">
                        <h5 class="card-title">Restaurants</h5>
                        <select class="form-select" aria-label="Default select example" name="restaurant">
                            <option value="" selected>--select restaurant--</option>
                            @foreach ($restaurants as $restaurant)
                                <option value="{{ $restaurant }}">{{ $restaurant }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
            </div>
        </div>

        <div style="margin-top: 20px" class="row">
            <div class="col-6">
                <a href="{{ route('food-order.postStepOne')}}" type="button" class="btn btn-primary">Left</a>
            </div>
            <div class="col-6" style="text-align: end !important">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </form>
@endsection
