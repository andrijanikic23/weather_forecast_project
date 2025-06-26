@foreach($city->forecasts as $forecast)

    <p>Sunrise {{ $sunrise }}</p>
    <p>Sunset {{ $sunset }}</p>
    <p>Date: {{ $forecast->forecast_date }} - Temperature: {{ $forecast->temperature }}</p>

@endforeach
