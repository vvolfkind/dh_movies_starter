@extends('layouts.master')
@section('content')

<br>
<div class="offset-2 col-6">
    <h1>Carrito</h1>
    <br>
    @if($movies !== null)
    <ul>
        @foreach($movies as $movie)
        <li>
            <p>{{ $movie['titulo'] }}</p><br>
            <a class="btn btn-info" href="/cart/remove/{{ $movie['id'] }}">Quitar</a>
        </li>
        <br>
        @endforeach
    </ul>
    <br>
    <a class="btn btn-danger" href="/cart/flush">Vaciar Carrito</a>
    @else
        <div class="alert alert-danger" role="alert">
            Todavia no hay nada aca, agregate alguna <a href="/movies">peli!</a>!
        </div>
    @endif
</div>

@endsection