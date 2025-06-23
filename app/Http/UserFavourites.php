<?php

namespace App\Http;

use Illuminate\Support\Facades\Auth;

class UserFavourites
{


    public static function getUserFavourites()
    {
        $user = Auth::user();

        $userFavourites = $user->cityFavourites;

        return $userFavourites;
    }
}
