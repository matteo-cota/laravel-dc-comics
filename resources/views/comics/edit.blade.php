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
        <h1>Modifica Fumetto</h1>
        <form action="{{ route('comics.update', $index) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Titolo</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ $comic['title'] }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Salva Modifiche</button>
        </form>
    </div>
@endsection
