@foreach($forecast as $city => $temperature)
    <p>It's currently {{ $temperature }} degrees in city {{ $city }}</p>
@endforeach
