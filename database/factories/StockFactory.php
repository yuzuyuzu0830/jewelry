<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\StockCosmetic;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(StockCosmetic::class, function (Faker $faker) {
    return [
        'product' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'user_id' => 1,
        'color' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'brand' => $faker->realText($maxNbChars = 10, $indexSize = 5),
        'price' => $faker->numberBetween($min = 500, $max = 9000),
        'purchaseDate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'main_category' => 'ベースメイク',
    ];
});
