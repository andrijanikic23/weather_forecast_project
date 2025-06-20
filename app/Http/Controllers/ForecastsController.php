<?php

namespace App\Http\Controllers;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Http\Request;
class ForecastsController extends Controller
{
    public function index(CitiesModel $city)
    {

        $city = CitiesModel::with('forecasts')->findOrFail($city->id);

        return view('forecasts', compact('city'));
    }

    public function search(Request $request)
    {
        $cityName = $request->get("city");

        $cities = CitiesModel::with("todaysForecast")
            ->where("name", "LIKE", "%$cityName%")->get();

        if(count($cities) == 0)
        {
            return redirect()->back()->with("error","not_found");
        }

        return view("search_results", compact("cities"));
    }
}
