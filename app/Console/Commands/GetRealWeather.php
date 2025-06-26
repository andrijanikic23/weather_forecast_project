<?php

namespace App\Console\Commands;

use App\Models\CitiesModel;
use App\Models\ForecastsModel;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real {city}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command is used to synchronize real life weather with our application using the Open API.';

    /**
     * Execute the console command.
     */
    public function handle()
    {

        $city = $this->argument("city");

        $dbCity = CitiesModel::where("name", $city)->first();

        if($dbCity === null)
        {
            $dbCity = CitiesModel::create([
                "name" => $city
            ]);
        }

        if($dbCity->todaysForecast)
        {
            return;
        }


        $response = Http::get(env("WEATHER_API_URL")."v1/forecast.json", [
            "key" => env("WEATHER_API_KEY"),
            "q" => $city,
            "aqi" => "no",
            "days" => 1
        ]);

        $jsonResponse = $response->json();
        if(isset($jsonResponse["error"]))
        {
            $this->output->error($jsonResponse["error"]["message"]);
        }

        $cityId = $dbCity->id;

        $forecastDay = $jsonResponse["forecast"]["forecastday"][0];

        $temperature = $forecastDay["day"]["avgtemp_c"];
        $forecastDate = $forecastDay["date"];
        $weatherType = $forecastDay["day"]["condition"]["text"];
        $probability = $forecastDay["day"]["daily_chance_of_rain"];

        ForecastsModel::create([
           "city_id" => $cityId,
           "temperature" => $temperature,
           "forecast_date" => $forecastDate,
           "weather_type" => strtolower($weatherType),
           "probability" => $probability
        ]);

    }
}
