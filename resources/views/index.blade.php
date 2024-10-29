@extends('layouts.app')

@section('content')
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fumetti</title>
    @vite(['resources/css/app.scss', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="{{ route('comics.index') }}">DC Comics Archive</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comics.index') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('comics.create') }}">Crea Fumetto</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h1 class="mb-4">Lista Fumetti</h1>

        <!-- Mostra messaggi di successo -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('comics.create') }}" class="btn btn-success mb-3">Crea un Nuovo Fumetto</a>
        <div class="row">
            @foreach ($comics as $comic)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        <img src="{{ $comic['thumb'] }}" alt="{{ $comic['title'] }}" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title">{{ $comic['title'] }}</h5>
                            <p class="card-text">{{ $comic['description'] }}</p>
                            <p><strong>Prezzo:</strong> €{{ number_format((float) $comic['price'], 2, ',', '.') }}</p>
                            <p><strong>Serie:</strong> {{ $comic['series'] }}</p>
                            <p><strong>Data di vendita:</strong> {{ \Carbon\Carbon::parse($comic['sale_date'])->format('d/m/Y') }}</p>
                            <p><strong>Tipo:</strong> {{ $comic['type'] }}</p>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.1.3/js/bootstrap.min.js"></script>
</body>
</html>
@endsection
