<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\NewItem;
use Faker\Generator as Faker;

$factory->define(NewItem::class, function (Faker $faker) {
    return [
        'title' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'user_id' => 1,
        'color' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'brand' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'price' => $faker->numberBetween($min = 500, $max = 9000),
        'start' => $faker->date($format = 'Y-m-d', $max = 'now'),
    ];
});
