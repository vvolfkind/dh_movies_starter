@extends('layouts.master') 
@section('content')

<div class="col-7 offset-1">
    <h3 class="">Editando datos de la pelicula:</h3>
    <h2>{{ $movie->title }}</h2>
    @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form class="" action="" method="POST" enctype="multipart/form-data">
    {{ method_field('PATCH') }}
    @csrf
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" name="title" value="{{ $movie->title }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="Rating">Rating</label>
            <input type="text" name="rating" value="{{ $movie->rating }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="premios">Premios</label>
            <input type="text" name="awards" value="{{ $movie->awards }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="duracion">Duracion</label>
            <input type="text" name="length" value="{{ $movie->length }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="fecha_de_estreno">Fecha de estreno</label>
            <input type="text" name="release_date" value="{{ $movie->release_date }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="genero">Género</label>
            <select class="form-control" name="genre_id">
                <option value="{{ $genre->id }}" selected>{{ $genre->name }}</option>
            @foreach($genres as $genre)
                <option value="{{ $genre->id }}">{{ $genre->name }}</option>
            @endforeach
        </select>
        </div>

        <div class="form-group">
            <input type="submit" class="btn btn-danger" value="Confirmar Cambios">
        </div>
    </form>
</div>
@endsection