<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Genre;
use App\Movie;

class GenreController extends Controller
{

    public function index()
    {
        $genres = Genre::all();
        return view('genres.index')->with('genres', $genres);

    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function showMovies($id)
    {
        $genre = Genre::find($id);
        $movies = Movie::where('genre_id', $id)->get();
        
        return view('genres.show')->with('genre', $genre)->with('movies', $movies);
    }

    // La variable en la ruta se debe llamar {genre}
    // public function show(Genre $genre)
    // return view('genres.mostrar')->with($genre);

    public function show($id)
    {

        //return view('genres.mostrar')->with('genre', Genre::find($id));

        // return view('genres.mostrar', ['genre' => Genre::find($id)]);

        return view('genres.mostrar')->withGenre(Genre::find($id));

    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
