@extends('layouts.master')

@section('content')

<div class="offset-2 col-6">
    <h1>Listado de Generos</h1>
    <ul>
        @foreach($genres as $genre)
        <li><a href="/genres/{{ $genre->id }}/movies">{{ $genre->name }}</a></li>
        @endforeach
    </ul>
</div>
@endsection