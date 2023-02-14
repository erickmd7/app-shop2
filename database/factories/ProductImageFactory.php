<?php

use Faker\Generator as Faker;
use App\ProductImage;
$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image' => 'https://via.placeholder.com/150',
        'product_id' => $faker->numberBetween(1,100)
    ];
});
