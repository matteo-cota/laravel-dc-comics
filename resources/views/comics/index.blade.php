@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h1 class="mb-4">Lista Fumetti</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('comics.create') }}" class="btn btn-success mb-3">Crea un Nuovo Fumetto</a>
    <div class="row">
        @foreach ($comics as $comic)
            <div class="col-md-4 mb-4">
                <div class="card h-100">
                    <img src="{{ $comic['thumb'] }}" class="card-img-top" alt="{{ $comic['title'] }}">
                    <div class="card-body">
                        <h5 class="card-title">{{ $comic['title'] }}</h5>
                        <p class="card-text">{{ $comic['description'] }}</p>
                        <a href="{{ route('comics.show', $comic['id']) }}" class="btn btn-primary">Dettagli</a>
                        <a href="{{ route('comics.edit', $comic['id']) }}" class="btn btn-warning">Modifica</a>
                        <form action="{{ route('comics.destroy', $comic['id']) }}" method="POST" class="d-inline delete-form">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Elimina</button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

<script>
    document.querySelectorAll('.delete-form').forEach(form => {
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            if (confirm('Sei sicuro di voler eliminare questo fumetto?')) {
                form.submit();
            }
        });
    });
</script>
@endsection
