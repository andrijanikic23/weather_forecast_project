<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/home', function(){
   return 'Hello World';
});

Route::get('/about', function(){
   return view('about');
});

Route::get('/contact', function(){
    return view('contact');
});

Route::view("/", "welcome");
Route::get("/search", [\App\Http\Controllers\ForecastsController::class, "search"])
    ->name("search");

Route::get("search/forecast/{city:name}", [\App\Http\Controllers\ForecastsController::class, "index"])
    ->name("forecast.permalink");

Route::get('/forecast', [\App\Http\Controllers\WeatherController::class, 'index']);

Route::get("/forecast/{city:name}", [\App\Http\Controllers\ForecastsController::class, "index"]);


Route::prefix("/admin")->middleware(\App\Http\Middleware\AdminCheckMiddleware::class)->group(function() {

    Route::view("/weather", "admin.weather_index");
    Route::post("/weather/update", [\App\Http\Controllers\AdminWeatherController::class, "update"])
        ->name("weather.update");

    Route::view("/forecasts", "admin.forecast_index");
    Route::post("/forecasts/create", [\App\Http\Controllers\AdminForecastsController::class, "create"])
        ->name("forecasts.create");
});






Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
