<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Song;
use Faker\Generator as Faker;

$factory->define(Song::class, function (Faker $faker) {
    return [
        'title' => $faker->unique()->word(),
        'description' => $faker->words(5, true),
        'length' => $faker->randomNumber(3, false)
    ];
});
