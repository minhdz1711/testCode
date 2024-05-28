<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function getContentFileByPath($path){
        $path = public_path($path);
        $data = [];
        if (File::exists($path)) {
            $contents = file_get_contents($path);
            $data = json_decode($contents, true);
        }
        return $data;
    }

    public function getData()
    {
        $path = public_path('/data/dishes.json');
        $data = [];
        if (File::exists($path)) {
            $contents = file_get_contents($path);
            $data = json_decode($contents, true)['dishes'];
        }
        return $data;
    }

    public function getRestaurants(){
        $data = $this->getData();
        $restaurants = [];
        foreach ($data as $item) {
            $restaurants[] = $item['name'];
        }
        return $restaurants;
    }

    public function getMeals(){
        $data = $this->getData();
        $meals = [];
        foreach ($data as $item) {
            foreach ($item["availableMeals"] as $availableMeal) {
                if (!in_array($availableMeal, $meals)) {
                    $meals[] = $availableMeal;
                }
            }
        }
        return $meals;
    }

    public function getResult()
    {
        $path = public_path('/data/result.json');
        $data = [];
        if (File::exists($path)) {
            $contents = file_get_contents($path);
            $data = json_decode($contents, true);
        }
        return $data;
    }

    public function putContent($data){
        $path = public_path('/data/result.json');
        if (File::exists($path)) {
            file_put_contents($path, $data);
        }
    }

    public function getRestaurantsByMeal($meal){
        $data = $this->getData();
        $restaurants = [];
        foreach ($data as $item) {
            if(in_array($meal, $item['availableMeals'])){
                $restaurants[] = $item['restaurant'];
            }else{
                continue;
            }
        }
        $restaurants = array_unique($restaurants);

        return $restaurants;
    }

    public function getFoodByRestaurantMeal($restaurant, $meal){
        $data = $this->getData();
        $foods = [];
        foreach ($data as $item) {
            if(in_array($meal, $item['availableMeals']) && $item['restaurant'] === $restaurant){
                $foods[] = $item['name'];
            }else{
                continue;
            }
        }
        $foods = array_unique($foods);
        return $foods;
    }
}
