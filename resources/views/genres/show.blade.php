@extends('layouts.master')

@section('content')
<br><br>

<div class="col-6 offset-2">
    <h2>Nuestras peliculas del genero {{ $genre->name }}</h2>
    <ul>
        @foreach($genre->movies as $movie)
        <li>
            <a href="/movies/{{ $movie->id }}">{{ $movie->title }}</a>
        </li>
        @endforeach
    </ul>
    <a href="/genres">Volver</a>
</div>

@endsection