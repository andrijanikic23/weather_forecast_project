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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/forecast', [\App\Http\Controllers\WeatherController::class, 'index']);

Route::get("/forecast/{city}", [\App\Http\Controllers\ForecastController::class, "index"]);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
