<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class GetRealWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'weather:get-real';

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
        $response = Http::get("https://api.weatherapi.com/v1/current.json", [
            "key" => "03c2db362ce8477fabe130248253003",
            "q" => "London",
            "aqi" => "no"
        ]);
        dd($response->body());
    }
}
