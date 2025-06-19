
@extends("admin.layout")

@section("content")

    <form method="POST" action="{{ route('forecasts.create') }}">

        <h2>Create new forecast</h2>

        {{ csrf_field() }}

        <div class="mb-3">
            <select name="city_id" class="form-select">
                @foreach(\App\Models\CitiesModel::all() as $city)
                    <option value="{{ $city->id }}"> {{ $city->name }}</option>
                @endforeach()
            </select>
        </div>

        <div class="mb-3">
            <input class="form-control" type="text" name="temperature" placeholder="Enter temperature">
        </div>


        <div class="mb-3">
            <select name="weather_type" class="form-select">
                @foreach(\App\Models\ForecastsModel::WEATHERS as $weather)
                    <option>{{ $weather }}</option>
                @endforeach()
            </select>
        </div>

        <div class="mb-3">
            <input class="form-control" type="text" name="probability" placeholder="Enter probability for rain">
        </div>

        <div class="mb-3">
            <input class="form-control" type="date" name="forecast_date">
        </div>


        <button>Save</button>

    </form>

    <div class="d-flex flex-wrap" style="gap: 10px;">
        @foreach(\App\Models\CitiesModel::all() as $city)

            <div>
                <p class="mb-1">{{ $city->name }}</p>

                <ul class="list-group mb-4">
                    @foreach($city->forecasts as $forecast)

                        @php
                            $colour = \App\Http\ForecastHelper::getColourByTemperature($forecast->temperature);
                            $icon = \App\Http\ForecastHelper::getIconByWeatherType($forecast->weather_type);
                        @endphp

                        <li class="list-group-item">{{ $forecast->forecast_date }} -
                            <i class="fa-solid {{ $icon }}"></i>
                            <span style="color: {{ $colour }};">{{ $forecast->temperature }}</span></li>


                    @endforeach
                </ul>
            </div>

        @endforeach
    </div>


@endsection






