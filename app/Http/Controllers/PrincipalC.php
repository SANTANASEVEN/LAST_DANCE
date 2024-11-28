<?php

namespace App\Http\Controllers;

use App\Models\Pelicula;
use App\Models\Serie;
use Illuminate\Http\Request;

class PrincipalC extends Controller
{
    public function index() {
        return view('presentacion.index');
    }

    // Mostrar lista de películas con paginación
    public function indexPeliculas() {
        $peliculas = Pelicula::paginate(10);
        return view('peliculas.index', compact('peliculas'));
    }

    // Mostrar lista de series con paginación
    public function indexSeries() {
        $series = Serie::paginate(10);
        return view('series.index', compact('series'));
    }

    // Mostrar el formulario para agregar una película
    public function agregarPelicula() {
        return view('peliculas.agregar');
    }

    // Mostrar el formulario para agregar una serie
    public function agregarSerie() {
        return view('series.agregar');
    }

    // Guardar una nueva película
    public function guardarPelicula(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'director' => 'required',
            'duracion' => 'required|integer|min:1',
            'poster' => 'required|image',
            'descripcion' => 'required',
        ]);

        $poster = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('img/peliculas'), $poster);

        Pelicula::create([
            'titulo' => $request->titulo,
            'director' => $request->director,
            'duracion' => $request->duracion,
            'poster' => $poster,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('peliculas.index')->with('mensaje', 'Película agregada correctamente');
    }

    // Guardar una nueva serie
    public function guardarSerie(Request $request) {
        $request->validate([
            'titulo' => 'required',
            'temporadas' => 'required|integer|min:1',
            'poster' => 'required|image',
            'descripcion' => 'required',
        ]);

        $poster = time() . '.' . $request->poster->extension();
        $request->poster->move(public_path('img/series'), $poster);

        Serie::create([
            'titulo' => $request->titulo,
            'temporadas' => $request->temporadas,
            'poster' => $poster,
            'descripcion' => $request->descripcion,
        ]);

        return redirect()->route('series.index')->with('mensaje', 'Serie agregada correctamente');
    }

    // Método para editar una película
    public function editarPelicula($id) {
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            return redirect()->route('peliculas.index')->with('error', 'Película no encontrada');
        }
        return view('peliculas.editar', compact('pelicula'));
    }

    // Método para editar una serie
    public function editarSerie($id) {
        $serie = Serie::find($id);
        if (!$serie) {
            return redirect()->route('series.index')->with('error', 'Serie no encontrada');
        }
        return view('series.editar', compact('serie'));
    }

    // Método para actualizar una película
    public function actualizarPelicula(Request $request, $id) {
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            return redirect()->route('peliculas.index')->with('error', 'Película no encontrada');
        }

        $request->validate([
            'titulo' => 'required',
            'director' => 'required',
            'duracion' => 'required|integer|min:1',
            'poster' => 'nullable|image',
            'descripcion' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $poster = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('img/peliculas'), $poster);
            $pelicula->poster = $poster;
        }

        $pelicula->titulo = $request->titulo;
        $pelicula->director = $request->director;
        $pelicula->duracion = $request->duracion;
        $pelicula->descripcion = $request->descripcion;
        $pelicula->save();

        return redirect()->route('peliculas.index')->with('mensaje', 'Película actualizada correctamente');
    }

    // Método para actualizar una serie
    public function actualizarSerie(Request $request, $id) {
        $serie = Serie::find($id);
        if (!$serie) {
            return redirect()->route('series.index')->with('error', 'Serie no encontrada');
        }

        $request->validate([
            'titulo' => 'required',
            'temporadas' => 'required|integer|min:1',
            'poster' => 'nullable|image',
            'descripcion' => 'required',
        ]);

        if ($request->hasFile('poster')) {
            $poster = time() . '.' . $request->poster->extension();
            $request->poster->move(public_path('img/series'), $poster);
            $serie->poster = $poster;
        }

        $serie->titulo = $request->titulo;
        $serie->temporadas = $request->temporadas;
        $serie->descripcion = $request->descripcion;
        $serie->save();

        return redirect()->route('series.index')->with('mensaje', 'Serie actualizada correctamente');
    }

    // Eliminar una película
    public function eliminarPelicula($id) {
        $pelicula = Pelicula::find($id);
        if (!$pelicula) {
            return redirect()->route('peliculas.index')->with('error', 'Película no encontrada');
        }

        $pelicula->delete();
        return redirect()->route('peliculas.index')->with('mensaje', 'Película eliminada correctamente');
    }

    // Eliminar una serie
    public function eliminarSerie($id) {
        $serie = Serie::find($id);
        if (!$serie) {
            return redirect()->route('series.index')->with('error', 'Serie no encontrada');
        }

        $serie->delete();
        return redirect()->route('series.index')->with('mensaje', 'Serie eliminada correctamente');
    }
}
