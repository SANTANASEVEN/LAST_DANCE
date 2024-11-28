<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PrincipalC;

Route::get('/', [PrincipalC::class, 'index'])->name('index');
Route::get('/peliculas', [PrincipalC::class, 'indexPeliculas'])->name('peliculas.index');
Route::get('/series', [PrincipalC::class, 'indexSeries'])->name('series.index');

// Rutas para agregar
Route::get('/peliculas/agregar', [PrincipalC::class, 'agregarPelicula'])->name('peliculas.agregar');
Route::get('/series/agregar', [PrincipalC::class, 'agregarSerie'])->name('series.agregar');

// Rutas para guardar
Route::post('/peliculas/guardar', [PrincipalC::class, 'guardarPelicula'])->name('peliculas.guardar');
Route::post('/series/guardar', [PrincipalC::class, 'guardarSerie'])->name('series.guardar');

// Ruta para editar
Route::get('/peliculas/{id}/editar', [PrincipalC::class, 'editarPelicula'])->name('peliculas.editar');
Route::get('/series/{id}/editar', [PrincipalC::class, 'editarSerie'])->name('series.editar');

// Rutas para actualizar
Route::put('/peliculas/{id}/actualizar', [PrincipalC::class, 'actualizarPelicula'])->name('peliculas.actualizar');
Route::put('/series/{id}/actualizar', [PrincipalC::class, 'actualizarSerie'])->name('series.actualizar');

// Rutas para eliminar
Route::delete('/peliculas/{id}/eliminar', [PrincipalC::class, 'eliminarPelicula'])->name('peliculas.eliminar');
Route::delete('/series/{id}/eliminar', [PrincipalC::class, 'eliminarSerie'])->name('series.eliminar');
