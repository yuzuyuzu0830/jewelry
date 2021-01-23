<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;

$factory->define(App\Models\StockCosmetic::class, function (Faker $faker) {
    return [
        'product' => $faker->sentence(6),
        'user_id' => 1,
        'color' => $faker->words(3),
        'brand' => $faker->sentence(6),
        'price' => $faker->randomDigit(4),
        'purchaseDate' => now(),
        'main_category' =>$faker->randomElement(['スキンケア', 'アイメイク', 'リップメイク']),
    ];
});
