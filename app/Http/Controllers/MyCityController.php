<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class MyCityController extends Controller
{
    public function city(){
        $city = City::find(1);
        dump($city->city_name);
        dump($city->population_city);
    }
}
