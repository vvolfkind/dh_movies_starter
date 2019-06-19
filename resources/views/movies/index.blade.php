@extends('layouts.master') 
@section('content')

<br>

<div class="offset-2 col-6">
    <h1>Listado de Peliculas</h1>
    <br>
    <ul>
        @foreach($movies as $movie)
        <li>
            <a href="movies/{{ $movie->id }}">{{ $movie->title }}</a>
        </li>
        @endforeach
    </ul>
    <br>
     {{ $movies->links() }}
</div>

@endsection