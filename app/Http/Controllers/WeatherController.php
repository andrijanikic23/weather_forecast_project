<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class WeatherController extends Controller
{
    public function index()
    {
        $forecast = [
            "Belgrade" => 22,
            "Novi Sad" => 23,
            "Sarajevo" => 24,
            "Zagreb" => 26
        ];

        return view('weather', compact('forecast'));
    }
}
