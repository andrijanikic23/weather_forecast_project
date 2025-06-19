<?php

namespace App\Http;

class ForecastHelper
{

    const WEATHER_ICONS = [
        "rainy" => "fa-cloud-rain",
        "snowy" => "fa-snowflake",
        "sunny" => "fa-sun",
        "cloudy" => "fa-cloud-sun"
    ];

    public static function getIconByWeatherType($type)
    {
        $icon = self::WEATHER_ICONS[$type];
        return $icon;
    }
    public static function getColourByTemperature($temperature)
    {
        if($temperature <= 0)
        {
            $colour = "lightblue";
        }
        else if($temperature >= 1 && $temperature <= 15)
        {
            $colour = "blue";
        }
        else if($temperature >= 15 && $temperature <= 25)
        {
            $colour = "green";
        }
        else
        {
            $colour = "red";
        }

        return $colour;

    }
}
