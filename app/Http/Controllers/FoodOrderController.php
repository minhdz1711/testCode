<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FoodOrderController extends Controller
{

    public function stepOne()
    {
        $meals = $this->getMeals();
        return view('step1', compact('meals'));
    }

    public function postStepOne(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:10',
            'meal' => 'required'
        ]);
        $quantity = $request->input('quantity');
        $meal = $request->input('meal');
        $this->putContent(json_encode([
            'quantity_people' => $quantity,
            'meal' => $meal
        ], JSON_PRETTY_PRINT));

        return redirect()->route('food-order.viewStepTwo');
    }

    public function stepTwo()
    {
        $data_result = $this->getContentFileByPath('/data/result.json');
        $meal = $data_result['meal'];
        $restaurants = $this->getRestaurantsByMeal($meal);
        return view('step2', compact('restaurants'));
    }

    public function postStepTwo(Request $request)
    {
        $request->validate([
            'restaurant' => 'required',
        ]);
        $restaurent = $request->input('restaurant');
        $data_result = $this->getContentFileByPath('/data/result.json');

        $data_result['restaurant'] = $restaurent;
        file_put_contents(public_path('/data/result.json'), json_encode($data_result, JSON_PRETTY_PRINT));
        return redirect()->route('food-order.viewStepThree');
    }

    //view step one
    public function stepThree()
    {
        $data_result = $this->getContentFileByPath('/data/result.json');
        $meal = $data_result['meal'];
        $restaurant = $data_result['restaurant'];
        $foods = $this->getFoodByRestaurantMeal($restaurant, $meal);
        $qty_people = intval($data_result['quantity_people']);
        return view('step3', compact('foods', 'qty_people'));
    }

    public function postStepThree(Request $request)
    {
        $request->validate([
            'foods' => 'required',
            'foods.*' => 'required',
        ]);
        $data_result = $this->getContentFileByPath('/data/result.json');
        $foods = $request->foods;
        $quantities = $request->food_quantities;
        $food_quantity = [];
        $total_qty = 0;
        foreach ($foods as $key => $food) {
            $food_quantity[] = [
                'food' => $food,
                'quantity' => $quantities[$key]
            ];
            $total_qty +=  intval($quantities[$key]);
        }
        $data_result['foods'] = $food_quantity;
        file_put_contents(public_path('/data/result.json'), json_encode($data_result, JSON_PRETTY_PRINT));
        return redirect()->route('food-order.viewStepFour');
    }

    public function stepFour()
    {
        $data_result = $this->getContentFileByPath('/data/result.json');
        return view('step4', compact('data_result'));
    }

    public function success()
    {
        return view('success');
    }
}
