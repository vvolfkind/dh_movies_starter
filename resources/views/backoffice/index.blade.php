@extends('layouts.master')

@section('content')
<main role="main">
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
    <div class="container">
        <h1 class="display-3">Hola! Que hacemos hoy?</h1>
        <p>Selecciona una de estas opciones</p>
        <p><a class="btn btn-primary btn-lg" href="/movies/create" role="button">Agregar nueva pelicula</a></p>
        <p><a class="btn btn-primary btn-lg" href="/actors/create" role="button">Agregar nuevo actor</a></p>
        <p><a class="btn btn-primary btn-lg" href="https://laravel.com/docs/5.7" role="button">Documentacion Laravel</a></p>
    </div>
    </div>

</main>

@endsection