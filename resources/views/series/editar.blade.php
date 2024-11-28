@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Serie</h1>
    <a href="{{ route('index') }}"class="btn btn-primary">HOME</a>
    <form action="{{ route('series.actualizar', $serie->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="titulo">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $serie->titulo }}" required>
        </div>

        <div class="form-group">
            <label for="temporadas">Número de Temporadas</label>
            <input type="number" class="form-control" id="temporadas" name="temporadas" value="{{ $serie->temporadas }}" required min="1">
        </div>

        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea class="form-control" id="descripcion" name="descripcion" required>{{ $serie->descripcion }}</textarea>
        </div>

        <div class="form-group">
            <label for="poster">Poster</label>
            <input type="file" class="form-control-file" id="poster" name="poster">
            <img src="{{ asset('img/series/' . $serie->poster) }}" alt="Poster actual" width="100">
        </div>

        <button type="submit" class="btn btn-success">Actualizar Serie</button>
    </form>
</div>
@endsection
