<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Movie;
use App\Genre;

class MovieController extends Controller
{

    public function index()
    {
        $movies = Movie::all();
        return view('movies.index')->with('movies', $movies);
    }

    public function create()
    {
        $genres = Genre::all();
        return view('movies.create')->with('genres', $genres);
    }

    public function store(Request $request)
    {

        $rules = [
            'title' => 'required',
            'awards' => 'required',
            'release_date' => 'required',
            'rating' => 'required',
            'genre_id' => 'required',
            'length' => 'required'
        ];

        $messages = [
            'The :attribute field is mandatory'
        ];

        $this->validate($request, $rules, $messages);

        $movie = new Movie($request->all());

        // $movie = new Movie([
        //     'title' => $request->input('title'), 
        //     'awards' => $request->input('awards'), 
        //     'release_date' => $request->input('release_date'), 
        //     'rating' => $request->input('rating'), 
        //     'genre_id' => $request->input('genre_id'),
        //     'length' => $request->input('length'),
        // ]);

       $movie->save(); 

       return redirect('/movies');

    }

    public function show($id)
    {
        $movie = Movie::find($id);
        
        return view('movies.show')->with('movie', $movie);
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
