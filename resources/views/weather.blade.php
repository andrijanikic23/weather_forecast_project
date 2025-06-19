@foreach($forecast as $weather)
    <p>It's currently {{ $weather->temperature }} degrees in city {{ $weather->city->name }}</p>
@endforeach
