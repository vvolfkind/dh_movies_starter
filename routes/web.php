<?php

Route::get('/', 'HomeController@index');

// Movies
Route::group(['prefix' => 'movies'], function() {
    Route::get('/', 'MovieController@index');
    Route::get('/create', 'MovieController@create');
    Route::post('/create', 'MovieController@store');

    // Para hacer un UPDATE de un recurso, empezamos como siempre por la ruta
    // En este caso tenemos que pasar un ID de una pelicula ir a buscarla a la DB
    // y asi tener los datos de la misma para cargarlos en el formulario de edicion.
    // Esta es la ruta que devuelve este formulario, pero que tambien trae la pelicula.
    Route::get('{id}/update', 'MovieController@edit');
    // Esta es la ruta que procesa el formulario de edicion. Fijense que dice PATCH.
    // Tambien podria decir PUT, son lo mismo.
    Route::patch('{id}/update','MovieController@update');


    Route::get('/{id}','MovieController@show');

});

// Actors
Route::group(['prefix' => 'actors'], function() {
    Route::get('/', 'ActorController@index');
    Route::get('/{id}', 'ActorController@show');
    Route::get('/create', 'ActorController@create');
    Route::post('/create', 'ActorController@store');
});

// Generos
Route::group(['prefix' => 'genres'], function() {
    Route::get('/', 'GenreController@index');
    Route::get('/{id}', 'GenreController@show');
    Route::get('/create', 'GenreController@create');
    Route::post('/create', 'GenreController@store');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
