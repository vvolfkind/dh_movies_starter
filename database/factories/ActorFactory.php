<?php

use Faker\Generator as Faker;
use App\Actor;

$factory->define(Actor::class, function (Faker $faker) {
    return [
        'first_name' => $faker->name,
        'last_name' => $faker->name,
        'rating' => $faker->numberBetween(1, 2),
    ];
});
