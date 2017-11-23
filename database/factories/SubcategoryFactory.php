<?php

use App\Category;
use Faker\Generator as Faker;

$factory->define(App\Subcategory::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'category_id' => function(){
            return Category::all()->random();
        },
    ];
});
