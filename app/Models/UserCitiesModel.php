<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCitiesModel extends Model
{
    protected $table = "user_cities";

    protected $fillable = ["user_id", "city_id"];

    public function favouriteCity()
    {
        return $this->hasOne(CitiesModel::class, "id", "city_id");
    }

    public function favouriteForecast()
    {
        return $this->hasOne(ForecastsModel::class, "city_id", "city_id");
    }
}
