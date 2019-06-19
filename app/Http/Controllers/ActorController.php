<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Actor;
use App\Movie;


class ActorController extends Controller
{

    public function index()
    {
        $actors = Actor::all();
        return view('actors.index')->with('actors', $actors);
    }

    public function create()
    {
        $movies = Movie::all();
        return view('actors.create')->with('movies', $movies);
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        $actor = Actor::find($id);
        return view('actors.show')->with('actor', $actor);
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
