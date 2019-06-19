<?php
// Home/Backoffice
Route::get('/', function () {
    return view('home');
});

Route::get('/backoffice', 'BackofficeController@index');

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
Route::get('/movies/{id}/edit', 'MovieController@edit');
Route::patch('/movies/{id}/edit', 'MovieController@update');

// Genres
Route::get('/genres', 'GenreController@index');
Route::get('/genres/{id}/movies', 'GenreController@showMovies');
Route::get('/genres/{id}', 'GenreController@show');

// Metodo resource, crea todas las rutas siguiendo las convenciones de resource
// creando tambien un name para cada una
Route::resource('director', 'DirectorController');
// Ejecutar php artisan route:list para ver la lista completa de rutas!
