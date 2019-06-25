<?php

use Illuminate\Http\Request;


Route::get('/', 'HomeController@index');
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
Route::get('/movies/create', 'MovieController@create')->middleware('admin');

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

Auth::routes();

// Ejecutar php artisan route:list para ver la lista completa de rutas!

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'cart'], function() {
    Route::get('/', 'CartController@index');
    Route::get('/add/{movie_id}', 'CartController@add');
    Route::get('/remove/{movie_id}', 'CartController@remove');
    Route::get('/checkout', 'CartController@checkout');
    Route::get('/flush', 'CartController@flush');
});


// Route::get('/attach', function(Request $request) {
//     // $movie = App\Movie::find(2);
//     // $actor = App\Actor::find(10);

//     // $movie->actors()->attach($actor->id);
// // $_SESSION['user'] = 'Rodo';
//     //dd($request->session()->get('carrito'), session()->get('carrito'));

//     $productos = [
//         0 =>[
//             'id' => 43,
//             'name' => 'Pack Oreo 72u.',
//             'price' => 3500.67,
//         ],
//         1 =>[
//             'id' => 23,
//             'name' => 'Empanada Frita Kentucky',
//             'price' => 55.00,
//         ]
//     ];

//     session(['user' => 'Rodo']);
//     session(['cart' => $productos]);

//     $carrito = session()->get('cart');

//     $total = 0;

//     foreach($carrito as $producto) {
//         $total = $total + $producto["price"];
//     }

//     // Transactions

//     // user_id, timestamps, transaction

//     $user_id = $request->user()->id;
//     $transaction = json_encode($carrito);

//     $transaccion = new Transaction([
//         'user_id' => $user_id,
//         'transaction' => $transaction
//     ]);

//     dd($total);

// });