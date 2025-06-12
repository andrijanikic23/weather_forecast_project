<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForecastController extends Controller
{
    public function index($city)
    {
        $forecasts = [
          "belgrade" => [22, 24, 25, 20, 18],
          "sarajevo" => [20, 24, 22, 22, 25],
        ];

        $city = strtolower($city);

        if(!array_key_exists($city, $forecasts))
        {
            die("This city doesn't exist");
        }

        dd($forecasts[$city]);
    }
}
