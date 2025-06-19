@foreach($city->forecasts as $forecast)
    <p>Date: {{ $forecast->forecast_date }} - Temperature: {{ $forecast->temperature }}</p>
@endforeach
