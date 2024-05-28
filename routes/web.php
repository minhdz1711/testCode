<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FoodOrderController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::prefix('food-order')->group(function () {
    Route::controller(FoodOrderController::class)->group(function () {
        Route::get('step-one','stepOne')->name('food-order.viewStepOne');
        Route::get('step-two', 'stepTwo')->name('food-order.viewStepTwo');
        Route::get('step-three', 'stepThree')->name('food-order.viewStepThree');
        Route::get('step-four','stepFour')->name('food-order.viewStepFour');
        Route::get('step-success','success')->name('food-order.viewStepSuccess');
        Route::post('step-one', 'postStepOne')->name('food-order.postStepOne');
        Route::post('step-two', 'postStepTwo')->name('food-order.postStepTwo');
        Route::post('step-three', 'postStepThree')->name('food-order.postStepThree');
    });
});
