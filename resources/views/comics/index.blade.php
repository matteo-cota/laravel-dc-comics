@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-4">Lista dei Fumetti</h1>
        <a href="{{ route('comics.create') }}" class="btn btn-primary mb-3">Aggiungi Nuovo Fumetto</a>
        <ul class="list-group">
            @foreach ($comics as $comic)
                <li class="list-group-item">
                    <a href="{{ route('comics.show', $comic->id) }}">{{ $comic->title }}</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
