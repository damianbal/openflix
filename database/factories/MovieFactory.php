<?php

use Faker\Generator as Faker;

$factory->define(App\Movie::class, function (Faker $faker) {
    return [
        //
        'title' => title_case($faker->word()),
        'description' => $faker->sentence(),
        'genre_id' => rand(1,3),
    ];
});
