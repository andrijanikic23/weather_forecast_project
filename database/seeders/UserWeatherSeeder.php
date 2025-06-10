<?php

namespace Database\Seeders;

use App\Models\WeatherModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserWeatherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $city = $this->command->getOutput()->ask('What is the name of city');


        if($city == null)
        {
            $this->command->getOutput()->error('No city entered!');
        }

        $temperature = $this->command->getOutput()->ask('What is the temperature');

        if($temperature == null)
        {
            $this->command->getOutput()->error('No temperature entered!');
        }

        WeatherModel::create([
            'city' => $city,
            'temperature' => $temperature,
        ]);

        $this->command->getOutput()->info("You have successfully entered city $city with temperature $temperature degrees.");
    }
}
