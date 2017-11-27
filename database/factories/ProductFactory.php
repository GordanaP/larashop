<?php

use App\Brand;
use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'subcategory_id' => function(){
            return Subcategory::all()->random();
        },
        'brand_id' => function(){
            return Brand::all()->random();
        },
        'name' => $faker->sentence(2),
        'description' => $faker->sentence,
        'price' => $faker->numberBetween($min = 1000, $max = 9000)
    ];
});
