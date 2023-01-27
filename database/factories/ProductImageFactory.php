<?php

use Faker\Generator as Faker;
use App\ProductImage;
$factory->define(ProductImage::class, function (Faker $faker) {
    return [
        'image' => "https://loremflickr.com/250/250",
        'product_id' => $faker->numberBetween(1,100)
    ];
});
