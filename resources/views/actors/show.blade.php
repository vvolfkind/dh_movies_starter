@extends('layouts.master')
@section('content')
<br>
<div class="offset-1">
    <h2>{{ $actor->first_name }} {{ $actor->last_name }}</h2>
    <h4>Rating: {{ $actor->rating }}</h4>
</div>
<br><br>
<div>
    <a href="/actors">Volver a Index de Actores</a>
</div>

@endsection