@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Películas</h1>
    <a href="{{ route('peliculas.agregar') }}" class="btn btn-primary">Agregar Película</a>
    <a href="{{ route('index') }}" class="btn btn-primary">HOME</a>
    <table class="table">
        <thead>
            <tr>
                <th>Título</th>
                <th>Director</th>
                <th>Duración</th>
                <th>Poster</th>
                <th>Descripción</th> <!-- Nueva columna para descripción -->
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($peliculas as $pelicula)
                <tr>
                    <td>{{ $pelicula->titulo }}</td>
                    <td>{{ $pelicula->director }}</td>
                    <td>{{ $pelicula->duracion }} mins</td>
                    <td><img src="{{ asset('img/peliculas/' . $pelicula->poster) }}" alt="{{ $pelicula->titulo }}" width="100"></td>
                    <td>{{ $pelicula->descripcion }}</td> <!-- Mostrar descripción -->
                    <td>
                        <a href="{{ route('peliculas.editar', $pelicula->id) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('peliculas.eliminar', $pelicula->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta película?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $peliculas->links() }}
</div>
@endsection
