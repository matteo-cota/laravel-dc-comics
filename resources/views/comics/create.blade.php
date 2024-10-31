@extends('layouts.app')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

    <div class="container mt-5">
        <h1 class="mb-4">Crea un Nuovo Fumetto</h1>
        <form action="{{ route('comics.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il titolo" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea class="form-control" id="description" name="description" rows="4" placeholder="Inserisci una breve descrizione" required></textarea>
            </div>
            <div class="mb-3">
                <label for="thumb" class="form-label">URL Immagine</label>
                <input type="url" class="form-control" id="thumb" name="thumb" placeholder="https://esempio.com/immagine.jpg" required>
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Prezzo</label>
                <input type="number" step="0.01" class="form-control" id="price" name="price" placeholder="Inserisci il prezzo" required>
            </div>
            <div class="mb-3">
                <label for="series" class="form-label">Serie</label>
                <input type="text" class="form-control" id="series" name="series" placeholder="Inserisci il nome della serie" required>
            </div>
            <div class="mb-3">
                <label for="sale_date" class="form-label">Data di Vendita</label>
                <input type="date" class="form-control" id="sale_date" name="sale_date" required>
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Tipo</label>
                <input type="text" class="form-control" id="type" name="type" placeholder="Inserisci il tipo di fumetto" required>
            </div>
            <button type="submit" class="btn btn-primary">Crea Fumetto</button>
            <a href="{{ route('comics.index') }}" class="btn btn-secondary">Annulla</a>
        </form>
    </div>
@endsection
