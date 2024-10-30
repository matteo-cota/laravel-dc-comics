@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="comic">
            <h1>{{ $comic['title'] }}</h1>
            <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}" class="img-fluid">
            <p>{{ $comic['description'] }}</p>
            <p>Prezzo: {{ number_format((float)$comic['price'], 2, ',', '.') }} €</p>
            <p>Serie: {{ $comic['series'] }}</p>
            <p>Data di vendita: {{ \Carbon\Carbon::parse($comic['sale_date'])->format('d/m/Y') }}</p>
            <p>Tipo: {{ $comic['type'] }}</p>
        </div>
        <a href="{{ route('comics.index') }}" class="btn btn-secondary mt-3">Torna indietro</a>
    </div>
@endsection
