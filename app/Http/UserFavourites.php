<?php

namespace App\Http;

use Illuminate\Support\Facades\Auth;

class UserFavourites
{


    public static function getUserFavourites()
    {
        $user = Auth::user();

        if($user == null)
        {
            return false;
        }

        $userFavourites = $user->cityFavourites;

        return $userFavourites;
    }
}
