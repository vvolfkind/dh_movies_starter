<?php

Route::get('/', 'HomeController@index');

// Actores
// Ejemplo de agrupacion de rutas con prefix 'actors'
Route::group(['prefix' => 'actors'], function() {
    Route::get('/', 'ActorController@index');
    Route::get('/create', 'ActorController@create');
    Route::get('/{id}/edit', 'ActorController@edit');
    Route::patch('/{id}/edit', 'ActorController@update');
    Route::get('/{id}', 'ActorController@show');
    Route::post('/create', 'ActorController@store');
});

// Movies
Route::get('/movies', 'MovieController@index');
// Esta ruta va por get, y apunta al metodo del controlador que va a devolver el form
Route::get('/movies/create', 'MovieController@create');

// Esta ruta TIENE LA MISMA URL QUE LA ANTERIOR, PERO va por POST, 
// y apunta al metodo del controlador que va a insertar el recurso en la base de datos
Route::post('/movies/create', 'MovieController@store');

Route::get('/movies/{id}', 'MovieController@show');
// Para hacer un UPDATE de un recurso, empezamos como siempre por la ruta
// En este caso tenemos que pasar un ID de una pelicula ir a buscarla a la DB
// y asi tener los datos de la misma para cargarlos en el formulario de edicion.
// Esta es la ruta que devuelve este formulario, pero que tambien trae la pelicula.
Route::get('/movies/{id}/update', 'MovieController@edit');
// Esta es la ruta que procesa el formulario de edicion. Fijense que dice PATCH.
// Tambien podria decir PUT, son lo mismo.
Route::patch('/movies/{id}/update', 'MovieController@update');

// Genres
Route::get('/genres', 'GenreController@index');
Route::get('/genres/{id}/movies', 'GenreController@showMovies');
Route::get('/genres/{id}', 'GenreController@show');

// Ejecutar php artisan route:list para ver la lista completa de rutas!
