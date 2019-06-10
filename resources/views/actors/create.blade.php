@extends('layouts.master') 
@section('content')

<div class="col-6 offset-2">
    <h2>Agregando nuevo Actor</h2>
    <form class="col-6" action="" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Primer Nombre</label>
        <input class="form-control" class="form-control" type="text" name="first_name" value="{{ old("first_name") }}" />
        </div>
        <div class="form-group">
            <label for="last_name">Segundo Nombre</label>
            <input class="form-control" class="form-control" type="text" name="last_name" value="{{ old("last_name") }}" />
        </div>
        <div class="form-group">
            <label for="rating">Rating</label>
            <input class="form-control" class="form-control" type="text" name="rating" value="{{ old("rating") }}" />
        </div>
        <div class="form-group">
            <label for="favorite_movie">Pelicula Favorita</label>
            <select class="form-control" name="movie">
                    <option value="{{ old("movie") }}" disabled selected>Seleccione Pelicula</option>
                @foreach($movies as $movie)
                    @if ($movie->id == old("movie"))
                        <option value="{{ $movie->id }}" selected>
                        {{ $movie->name }}
                        </option>
                    @else
                        <option value="{{ $movie->id }}">
                        {{ $movie->title }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar actor">
        </div>
    </form>
</div>
@endsection