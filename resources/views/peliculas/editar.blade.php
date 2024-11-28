@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Película</h1>
    <a href="{{ route('index') }}"class="btn btn-primary">HOME</a>
    <form action="{{ route('peliculas.actualizar', $pelicula->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $pelicula->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" id="director" name="director" value="{{ $pelicula->director }}" required>
        </div>

        <div class="form-group">
            <label for="duracion">Duración (en minutos)</label>
            <input type="number" class="form-control" id="duracion" name="duracion" value="{{ $pelicula->duracion }}" required min="1">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $pelicula->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control-file" id="poster" name="poster">
            <img src="{{ asset('img/peliculas/' . $pelicula->poster) }}" alt="Poster actual" width="100">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Película</button>
    </form>
</div>
@endsection
