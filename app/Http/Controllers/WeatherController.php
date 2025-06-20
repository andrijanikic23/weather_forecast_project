<?php

namespace App\Http\Controllers;

use App\Models\WeatherModel;

class WeatherController extends Controller
{
    public function index()
    {
        $forecast = WeatherModel::with('city')->get();

        return view('weather', compact('forecast'));
    }
}
