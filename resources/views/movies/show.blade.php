@extends('layouts.master') 
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $movie->title }}</h2>
    <h4>Fecha de estreno: {{ $movie->release_date }}</h4>
    <h4>Rating: {{ $movie->rating }}</h4>
    <h4>Premios: {{ $movie->awards }}</h4>
    <h4>Genero: {{ $movie->genre->name}}</h4>
    @if($movie->photopath !== null)
    <img src="/storage/{{ $movie->photopath }}" alt="lala">
    @endif
    
    {{-- <h4>Actuan (con mas de 7.0 de rating):</h4>
    <ul>
    @foreach ($movie->actorsMinRating7() as $actor)
    	<li>{{ $actor->fullName() }} ({{ $actor->rating }})</li>
    @endforeach
    </ul> --}}
{{-- 
    <h4>Actuan (con mas de 5 peliculas):</h4>
    <ul>
    @foreach ($movie->bussyActors() as $actor)
        <li>{{ $actor->fullName() }}</li>
    @endforeach
    </ul> --}}
    <br>
    <a class="btn btn-warning" href="{{ url("movies/$movie->id/edit") }}">Editar Pelicula</a>
    <br>
    <br>

    <a href="/movies">Volver a Index de Peliculas</a>
</div>


@endsection