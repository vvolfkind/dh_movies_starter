@extends('layouts.master') 
@section('content')


{{-- VISTA PARA EDITAR PELICULAS! --}}


<div class="col-7 offset-1">
    <h3 class="">Editando datos de la pelicula:</h3>
    <h2>{{ $movie->title }}</h2>
    {{-- Muestreo de errores si los hubiera --}}
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
    {{-- IMPORTANTE: hay que agregar este metodo (method_field) ya que HTML no reconoce si le pones 
        "PATCH" en el method de un form. Solo reconoce POST y GET. Laravel nos facilita la vida y nos da
        este metodo para que el flujo se de sin problemas.  --}}

    @csrf
        {{-- Fijense que en cada VALUE de los inputs, ya van a tener cargados los datos de la pelicula seleccionada --}}
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
            {{-- Aca hacemos un parate, fijense que gracias a las relaciones, puedo acceder al genero actual
                de esta pelicula, y la dejo como SELECTED a esa option del Select. --}}
            <select class="form-control" name="genre_id">
                <option value="{{ $movie->genre->id }}" selected>{{ $movie->genre->name }}</option>
                {{-- Aun asi, si necesitara cambiar el genero, el foreach es de GENEROS directamente, 
                    que es una variable del tipo Collection que los llego del backend, con un array de 
                    objetos del tipo Genre a los cuales puedo pedirles id y name --}}
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