@extends("layout")


@section("content")

    <div class="d-flex flex-wrap container">
        @foreach($cities as $city)

            @php $icon = \App\Http\ForecastHelper::getIconByWeatherType($city->todaysForecast->weather_type) @endphp
            <p><a class="btn btn-primary text-white m-2" href="{{ route('forecast.permalink', ['city' => $city->name]) }}">
                    <i class="fa-solid {{ $icon }}"></i>{{ $city->name }}</a></p>

        @endforeach
    </div>

@endsection
