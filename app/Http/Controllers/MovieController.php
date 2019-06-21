<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Abajo de esta linea, declaramos que models va a usar este controlador.
use App\Movie;
use App\Genre;

class MovieController extends Controller
{

    public function index()
    {
        // el metodo index indexa nuestro recurso, osea lista los elementos del tipo del modelo que 
        // maneja el controlador
        
        $limit = 10;

        // $movies = Movie::paginate($limit);
        $movies = Movie::make()->sortByTitle()->paginate($limit);

        // Metodo de collection para devolver JSON
        // return Movie::all()->toJson();

        // Ejemplo de callback
        // $movies->filter(function ($movie) {
        //     return $movie->title !== 'Avatar';
        // })->dd();

        return view('movies.index')->with('movies', $movies);

    }

    public function create()
    {
        // El metodo create SOLO devuelve la vista del formulario de creacion
        // mas lo que necesitemos para la generacion del mismo, en este caso los generos, 
        // que son de OTRO modelo.
        $genres = Genre::all();
        return view('movies.create')->with('genres', $genres);
    }

    public function store(Request $request)
    {
        //VALIDACION
        // Aplicamos las reglas. Como en todo array asociativo, tenemos claves y valores.
        // En este caso, las claves (del lado izquierdo), son LOS NAME del formulario, mientras que 
        // del lado derecho tenemos los valores, que son las reglas y pueden ser bastante mas amplias
        $reglas = [
            'title' => 'required',
            'rating' => 'required',
            'awards' => 'required',
            'length' => 'required',
            'release_date' => 'date|required',
            'genre_id' => 'required'
        ];

        // Podemos customisar el mensaje de error de esta manera. el valor :attribute hace referencia
        // a alguno de los name del formulario que hayan entrado por Request.
        // En este caso el mensaje es el mismo pero lo traducimos al castellano.
        $mensajes = [
            'required' => 'el campo :attribute es obligatorio'
        ];

        //
        $this->validate($request, $reglas, $mensajes);

        // Queda comentada la modalidad para insertar campo por campo
        // $movie = new Movie([
        //     'title' => $request->input('titulo'),
        //     'rating' => $request->input('rating'),
        //     'length' => $request->input('duracion'),
        //     'awards' => $request->input('premios'),
        //     'release_date' => $request->input('fecha_de_estreno'),
        //     'genre_id' => $request->input('genero'),
        // ]);

        $photopath = $request->file('photopath')->store('posters', 'public');
        
        $movie = new Movie($request->all());

        $movie->photopath = $photopath;

        $movie->save();

        return redirect('/movies');

    }

    public function show($id)
    {
        // el metodo show() muestra un elemento/objeto individual. Puede ser el perfil de un usuario, 
        // un producto, o como en este caso, una pelicula.
        $movie = Movie::find($id);
        return view('movies.show')->with('movie', $movie);
    }

    public function edit($id)
    {
        // el metodo edit es la responsabilidad del controlador de mostrar la vista de edicion de un recurso.
        // Para cargar la vista de edicion, en este caso tengo que mandarla con la pelicula (con su ID) y ademas su genero actual buscandolo individualmente ($genre), MAS los posibles generos que puedan llegar a tomar su lugar ($genres)

        $genres = Genre::all();

        $movie = Movie::find($id);

        // si el encadenamiento de metodos se extiende mucho...
        // return view('movies.editmovie')->with('movie', $movie)->with('genre', $genre)->with('genres', $genres);
        // podemos acortarlo asi:
        return view('movies.edit')
            ->with('movie', $movie)
            ->with('genre', $movie->genre)
            ->with('genres', $genres);

    }

    public function update(Request $request, $id)
    {
        // Dejo este dd comentado para ir viendo los cambios!
        //dd($request->all());
        // Primero que nada, nos auto-robamos la validacion:
        $rules = [
            'title' => 'required',
            'rating' => 'required',
            'awards' => 'required',
            'length' => 'required',
            'release_date' => 'date|required',
            'genre_id' => 'required',
        ];
        $messages = [
            'required' => 'el campo :attribute es obligatorio',
        ];
        
        $this->validate($request, $rules, $messages);
        // La logica de hacer un update es la siguiente:
        // Tenemos el personaje A, que se llama Request, y el personaje B, que se 
        // llama Movie.
        // El personaje Request trae data que puede ser nueva o no, y el personaje Movie
        // se para adelante y dice "compara con todo lo que tengo yo". Si el valor de un 
        // campo de Request es igual a lo que ya tiene Movie, no hay cambio. Si es diferente,
        // Movie atrapa el cambio y lo guarda, borrando el dato que tenia antes.
        // En codigo:
        $movie = Movie::find($id);
        // Explicacion con el primer campo/atributo
         $movie->title = $request->input('title') !== $movie->title ? $request->input('title') : $movie->title;
         // El titulo va a ser igual a lo que salga de este if ternario.
         // El if ocurre antes del signo de pregunta, "lo que llega de Request, NO ES igual a lo que movie ya tiene?"
         // si NO es igual, pone lo que llego, si es igual, queda como esta.
         $movie->rating = $request->input('rating') !== $movie->rating ? $request->input('rating') : $movie->rating;
         $movie->awards = $request->input('awards') !== $movie->awards ? $request->input('awards') : $movie->awards;
         $movie->length = $request->input('length') !== $movie->length ? $request->input('length') : $movie->length;
         $movie->release_date = $request->input('release_date') !== $movie->release_date ? $request->input('release_date') : $movie->release_date;
         $movie->genre_id = $request->input('genre_id') !== $movie->genre_id ? $request->input('genre_id') : $movie->genre_id;
         //una vez que terminamos el proceso anterior, simplemente hacemos:
         $movie->save();
         // y vamos a ver los cambios:
         return redirect("/movies/" . $movie->id);

    }

    public function destroy($id)
    {
        // Este es el metodo dedicado a BORRAR un elemento individual de muestra base de datos.
        // Queda sin efecto porque tenemos que ver otros temas antes de poder usarlo.
    }
}
