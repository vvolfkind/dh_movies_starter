@extends('layouts.master') 
@section('content')

@if(count($errors) > 0)
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<br>
<div class="offset-3 col-6">
    <h1 class="text-center">Agregar nueva pelicula</h1>
    <form class="form-group" action="" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="title" value="{{ old("title") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="Rating">Rating</label>
            <input type="text" name="rating" value="{{ old("rating") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="premios">Premios</label>
            <input type="text" name="awards" value="{{ old("awards") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="duracion">Duracion</label>
            <input type="text" name="length" value="{{ old("length") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_de_estreno">Fecha de estreno</label>
            <input type="date" name="release_date" value="{{ old("release_date") }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-control" name="genre_id">
                <option value="" disabled selected>Seleccione genero</option>
                @foreach($genres as $genre)
                    @if ($genre->id == old("genre_id"))
                        <option value="{{ $genre->id }}" selected>
                        {{ $genre->name }}
                        </option>
                    @else
                        <option value="{{ $genre->id }}">
                        {{ $genre->name }}
                        </option>
                    @endif
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Agregar Película">
        </div>
    </form>
</div>
@endsection
