<?php

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' =>  ucfirst($faker->words(5, true)),
        'description' =>  $faker->sentence(10),
        'long_description' => $faker->text,
        'price' => $faker->randomFloat(2,5,150),
        'category_id' => $faker->numberBetween(1,5)
    ];
});
