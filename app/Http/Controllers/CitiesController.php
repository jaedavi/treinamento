<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;

class CitiesController extends Controller
{
    public function selectCity(Request $request, $stateId)
    {
       $cities = City::select('city')
        ->where('state_id', '=', $stateId)
        ->orderBy('city')
        ->get();
        return compact('cities');
    }
}
