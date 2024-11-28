@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Agregar Película</h1>
    <a href="{{ route('index') }}"class="btn btn-primary">HOME</a>
    <form action="{{ route('peliculas.guardar') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
        </div>
        <div class="form-group">
            <label for="director">Director</label>
            <input type="text" class="form-control" id="director" name="director" required>
        </div>
        <div class="form-group">
            <label for="duracion">Duración</label>
            <input type="number" class="form-control" id="duracion" name="duracion" required>
        </div>
        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control" id="poster" name="poster" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar Película</button>
    </form>
</div>
@endsection
