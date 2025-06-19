<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class FakeUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $email = $this->command->getOutput()->ask("What's your email?");

        if($email == null)
        {
            $this->command->getOutput()->error("Please you have to enter your email!");
            return;
        }

        $username = $this->command->getOutput()->ask("What's your username?");

        if($username == null)
        {
            $this->command->getOutput()->error("Please you have to enter your username!");
            return;
        }

        $user = User::where(['email' => $email])->first();
        if($user instanceof User)
        {
            $this->command->getOutput()->error("User with this email is already registered!");
            return;
        }

        $password = $this->command->getOutput()->ask("What's your password?");

        if($password == null)
        {
            $this->command->getOutput()->error("Please you have to enter your password!");
            return;
        }

        User::create([
           "email" => $email,
           "name" => $username,
           "password" => Hash::make($password),
        ]);

        $this->command->getOutput()->info("You have successfully created new user!");
    }
}
