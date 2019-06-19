<?php

use App\Genre;
use App\Movie;
use App\Actor;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    // En la funcion run() usamos los factories que hayamos creado
    public function run()
    {
        $genres = factory(Genre::class)->times(10)->create();
        $movies = factory(Movie::class)->times(10)->create([
            'genre_id' => $genres->random()->id
        ]);

        $actors = factory(Actor::class, 50)->create([
            'favorite_movie_id' => $movies->random()->id
        ]);

        $movies->each( function($movie) use ($actors) {
            // $movie es una instancia de Movie
            // actors() es un metodo del modelo Movie (belongsToMany())

            // $actors es una collection, y random(3) devuelve una collection de 3 actores

            $movie->actors()->saveMany($actors->random(3));
        });
    }

    // luego en la consola: php artisan db:seed
}
