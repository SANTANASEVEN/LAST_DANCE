@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Series</h1>
    <a href="{{ route('series.agregar') }}" class="btn btn-primary">Agregar Serie</a>
    <a href="{{ route('index') }}" class="btn btn-primary">HOME</a>

    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Temporadas</th>
                <th>Poster</th>
                <th>Descripción</th>  <!-- Nueva columna para descripción -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($series as $serie)
                <tr>
                    <td>{{ $serie->titulo }}</td>
                    <td>{{ $serie->temporadas }} temporadas</td>
                    <td><img src="{{ asset('img/series/' . $serie->poster) }}" alt="Poster de {{ $serie->titulo }}" width="100"></td>
                    <td>{{ $serie->descripcion }}</td>  <!-- Mostrar descripción -->
                    <td>
                        <a href="{{ route('series.editar', $serie->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('series.eliminar', $serie->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta serie?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $series->links() }}
</div>
@endsection
