@extends('layouts.master') 
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $movie->title }}</h2>
    <h4>Fecha de estreno: {{ $movie->release_date }}</h4>
    <h4>Rating: {{ $movie->rating }}</h4>
    <h4>Premios: {{ $movie->awards }}</h4>
    <h4>Genero: {{ $movie->genre->name }}</h4>

    <br>
    <a class="btn btn-warning" href="{{ "/movies/$movie->id/update" }}">Editar Pelicula</a>
    <br>
    <br>

    <a href="/movies">Volver a Index de Peliculas</a>
</div>


@endsection