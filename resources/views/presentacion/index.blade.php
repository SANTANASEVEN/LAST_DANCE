@extends('layouts.app')
@section('nav')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">LAST_DANCE</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Enlace a la página de Películas -->
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('peliculas.index') }}">Películas</a>
                    </li>
                    <!-- Enlace a la página de Series -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('series.index') }}">Series</a>
                    </li>
                    <!-- Enlace a la página de Agregar Película -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('peliculas.agregar') }}">Agregar Película</a>
                    </li>
                    <!-- Enlace a la página de Agregar Serie -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('series.agregar') }}">Agregar Serie</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    @endsection