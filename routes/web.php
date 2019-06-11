<?php

Route::get('/', 'HomeController@index');

// Movies
Route::group(['prefix' => 'movies'], function() {
    Route::get('/', 'MovieController@index');
    Route::get('/create', 'MovieController@create');
    Route::post('/create', 'MovieController@store');
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

