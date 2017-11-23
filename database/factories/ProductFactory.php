<?php

use App\Subcategory;
use Faker\Generator as Faker;

$factory->define(App\Product::class, function (Faker $faker) {
    return [
        'subcategory_id' => function(){
            return Subcategory::all()->random();
        },
        'name' => $faker->sentence(2),
        'description' => $faker->paragraph(2),
        'price' => $faker->numberBetween(1000-10000)
    ];
});
