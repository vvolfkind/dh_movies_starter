@extends('layouts.master') 
@section('content')

<br>

<div class="offset-2 col-6">
    <h1>Listado de Peliculas</h1>
    <br>
    <ul>
        @foreach($movies as $movie)
        <li>
            <a href="movies/{{ $movie->id }}">{{ $movie->title }}</a><br>
            <a class="btn btn-info" href="/cart/add/{{ $movie->id }}">Agregar</a>
        </li>
        <br>
        @endforeach
    </ul>
    <br>
     {{ $movies->links() }}
</div>

@endsection