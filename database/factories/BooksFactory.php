<?php

use Faker\Generator as Faker;
use App\Books;

$factory->define(Books::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'release_date' => $faker->date,
        'author' => $faker->numberBetween($min = 1, $max = 10)
    ];
});