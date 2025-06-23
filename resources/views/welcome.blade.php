@extends("layout")

@section("content")

    @php
        $userFavourites = \App\Http\UserFavourites::getUserFavourites();
    @endphp



    @if($userFavourites !== false)
        @foreach($userFavourites as $favourite)
            @php $icon = \App\Http\ForecastHelper::getIconByWeatherType($favourite->favouriteForecast->weather_type) @endphp
            <p class="text-center mx-auto w-fit">{{ $favourite->favouriteCity->name }} <i class="fa-solid {{ $icon }}"></i> {{ $favourite->favouriteForecast->temperature }}</p>
        @endforeach
    @endif


    <form style="height: 100vh" class="text-white text-left d-flex flex-column conatiner justify-content-center align-items-center" method="GET" action="{{ route('search') }}">
        {{ csrf_field() }}
        <h1 class="col-md-4 col-12"><i class="fa-solid fa-house"></i>Find your city</h1>

        @if(\Illuminate\Support\Facades\Session::has("error"))
            <p class="text-danger">{{ \Illuminate\Support\Facades\Session::get("error") }}</p>
        @endif

        <div class="mb-3 col-md-4 col-12">
            <input class="form-control col-12" type="text" name="city" placeholder="Enter the name of city">
            <button class="btn btn-primary col-12 mt-3" type="submit"><i class="fa-brands fa-searchengin"></i>Search</button>
        </div>

    </form>

@endsection
