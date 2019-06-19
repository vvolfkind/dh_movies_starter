@extends('layouts.master')

@section('content')


	<h1> {{ $genre->name }}  </h1>


	<ul>
		@foreach($genre->movies as $movie)
			<li>{{ $movie->title }}</li>
		@endforeach
	</ul>

@endsection
