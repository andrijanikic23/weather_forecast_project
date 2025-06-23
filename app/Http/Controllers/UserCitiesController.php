<?php

namespace App\Http\Controllers;

use App\Models\UserCitiesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserCitiesController extends Controller
{
    public function favourite(Request $request, $city)
    {
        $user = Auth::user();
        if ($user === null) {
            return redirect()->back()->with(["error" => "You have to be logged in to add city into favourites"]);
        }

        UserCitiesModel::create([
            "city_id" => $city,
            "user_id" => $user->id
        ]);

        return redirect()->back();
    }

    public function trash(Request $request, $city)
    {
        $user = Auth::user();
        if ($user === null) {
            return redirect()->back()->with(["error" => "You have to be logged in to delete city from favourites"]);
        }

        UserCitiesModel::where("city_id", $city)->where("user_id", $user->id)->delete();


        return redirect()->back();
    }
}
