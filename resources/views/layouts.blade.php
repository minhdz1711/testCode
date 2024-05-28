<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <style>
        .active {
            background-color: #0d6efd
        }
    </style>
    <div class="container">
        <div style="margin-top: 30px">
            <div style="margin-bottom: 20px" class="btn-group" role="group"
                aria-label="Basic checkbox toggle button group">
                <input type="checkbox" class="btn-check" id="btncheck1" autocomplete="off" disabled>
                <label
                    class="btn btn-outline-primary {{ Route::currentRouteName() == 'food-order.viewStepOne' ? 'active' : '' }}"
                    for="btncheck1">Step 1</label>

                <input type="checkbox" class="btn-check" id="btncheck2" autocomplete="off" disabled>
                <label
                    class="btn btn-outline-primary {{ Route::currentRouteName() == 'food-order.viewStepTwo' ? 'active' : '' }}"
                    for="btncheck2">Step 2</label>

                <input type="checkbox" class="btn-check" id="btncheck3" autocomplete="off" disabled>
                <label
                    class="btn btn-outline-primary {{ Route::currentRouteName() == 'food-order.viewStepThree' ? 'active' : '' }}"
                    for="btncheck3">Step 3</label>

                <input type="checkbox" class="btn-check" id="btncheck4" autocomplete="off" disabled>
                <label
                    class="btn btn-outline-primary {{ Route::currentRouteName() == 'food-order.viewStepFour' ? 'active' : '' }}"
                    for="btncheck4">Step 4</label>

            </div>

            @yield('content')
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>
