<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ForecastsModel extends Model
{
    protected $table = "forecasts";

    protected $fillable = ["city_id", "temperature", "forecast_date"];
}
