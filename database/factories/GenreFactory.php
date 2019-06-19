<?php

use Faker\Generator as Faker;
use App\Genre;

// php artisan make:factory GenreFactory
$factory->define(Genre::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'ranking' => $faker->numberBetween(0, 10),
        'active' => 1
    ];
});
