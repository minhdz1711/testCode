@extends('layouts')

@section('content')
    <form method="POST" action="{{ route('food-order.postStepOne') }}">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3>Order Food - Step 1</h3>
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

                <div class="row">
                    <div class="col-6">
                        <h5 class="card-title">Meals</h5>
                        <select class="form-select" aria-label="Default select example" name="meal">
                            <option value="" selected>--select meal--</option>
                            @foreach ($meals as $meal)
                                <option value="{{ $meal }}">{{ $meal }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-6">
                        <h5 class="card-title">People</h5>
                        <div class="input-group mb-3">
                            <input type="number" value=1 class="form-control" placeholder="Quantity" aria-label="quantity"
                                aria-describedby="basic-addon2" name="quantity">
                            <span class="input-group-text" id="basic-addon2">people</span>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div style="margin-top: 20px" class="row">
            <div class="col-6">
                {{-- <button type="button" class="btn btn-primary">Left</button> --}}
            </div>
            <div class="col-6" style="text-align: end !important">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </form>
@endsection
