<?php

namespace Database\Seeders;

use App\Models\User;
use Faker\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $amount = $this->command->getOutput()->ask('How many users would you like?', 500);

        $password = $this->command->getOutput()->ask('What is your password?', '123456');


        $faker = Factory::create();

        $this->command->getOutput()->progressStart($amount);

        for($i = 0; $i < $amount; $i++)
        {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make($password),
            ]);

            $this->command->getOutput()->progressAdvance();
        }

        $this->command->getOutput()->progressFinish();
    }
}
