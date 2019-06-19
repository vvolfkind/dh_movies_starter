<?php

use Faker\Generator as Faker;
use App\Movie;

$factory->define(Movie::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'rating' => $faker->numberBetween(0, 2),
        'awards' => $faker->numberBetween(0, 2),
        'release_date' => now()->subYears(rand(1, 2)),
        'length' => $faker->numberBetween(45, 160),
    ];
});
