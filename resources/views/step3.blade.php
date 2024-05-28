@extends('layouts')

@section('content')
    <form method="POST" action="{{ route('food-order.postStepThree') }}">
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

                <div class="container" id="foodInputs">
                    <div class="row justify-content-center" id="foodInput_1">
                        <div class="col-6">
                            <h5 class="card-title">Foods</h5>
                            <select id="select_food_1" class="form-select" aria-label="Default select example"
                                name="foods[]" onchange="checkDuplicate(this)">
                                <option value="" selected>--select food--</option>
                                @foreach ($foods as $food)
                                    <option value="{{ $food }}">{{ $food }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3">
                            <h5 class="card-title">Quantity</h5>
                            <input id="select_qty_1" type="number" value="1" class="form-control"
                                placeholder="Quantity" aria-label="Food_quantity" aria-describedby="basic-addon2"
                                name="food_quantities[]">
                        </div>
                    </div>
                </div>

                <button type="button" class="btn btn-primary" onclick="addFoodInput()">Add Food</button>
            </div>
        </div>

        <div style="margin-top: 20px" class="row">
            <div class="col-6">
                <a href="{{ route('food-order.postStepTwo')}}" type="button" class="btn btn-primary">Left</a>
            </div>
            <div class="col-6" style="text-align: end !important">
                <button type="submit" class="btn btn-primary">Next</a>

            </div>
        </div>
        <script>
            var nextFoodInputId = 2;

            function addFoodInput() {
                var foodInput = document.createElement("div");
                foodInput.classList.add("row", "justify-content-center");
                foodInput.id = "foodInput_" + nextFoodInputId;

                var foodSelect = document.createElement("div");
                foodSelect.classList.add("col-6");
                var foodSelectHtml = `
                    <h5 class="card-title">Foods</h5>
                    <select id="select_food_${nextFoodInputId}" class="form-select" aria-label="Default select example" name="foods[]" onchange="checkDuplicate(this)">
                        <option value="" selected>--select food--</option>
                        @foreach ($foods as $food)
                            <option value="{{ $food }}">{{ $food }}</option>
                        @endforeach
                    </select>
                `;
                foodSelect.innerHTML = foodSelectHtml;

                var quantityInput = document.createElement("div");
                quantityInput.classList.add("col-3");
                var quantityInputHtml = `
                    <h5 class="card-title">Quantity</h5>
                    <input id="select_qty_${nextFoodInputId}" type="number" value="1" class="form-control" placeholder="Quantity" aria-label="Food_quantity" aria-describedby="basic-addon2" name="food_quantities[]">
                `;
                quantityInput.innerHTML = quantityInputHtml;

                foodInput.appendChild(foodSelect);
                foodInput.appendChild(quantityInput);

                document.getElementById("foodInputs").appendChild(foodInput);

                nextFoodInputId++;
            }

            function checkDuplicate(selectElement) {
                var selectedFood = selectElement.value;
                var selectElements = document.getElementsByName("foods[]");
                for (var i = 0; i < selectElements.length; i++) {
                    if (selectElements[i] !== selectElement && selectElements[i].value === selectedFood) {
                        alert("This food has already been selected!");
                        selectElement.value = "";
                        return;
                    }
                }
            }
        </script>
    </form>
@endsection
