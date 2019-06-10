@extends('layouts.master') 
@section('content')

<div class="offset-2 col-6">
<h1>Listado de Actores</h1>
    <ul>
        @foreach($actors as $actor)
        <li><a href="/actors/{{ $actor->id }}">{{ $actor->last_name }}, {{ $actor->first_name }}</a></li>
        @endforeach
    </ul>
</div>

@endsection