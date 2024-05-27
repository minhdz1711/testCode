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

Route::prefix('food')->group(function () {
    Route::get('/restaurant', [FoodOrderController::class, 'showDishes'])->name('home');
    Route::post('/select-restaurant', [FoodOrderController::class, 'showRestaurants'])->name('select.restaurant');
});
