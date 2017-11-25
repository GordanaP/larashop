<?php

namespace App\Filters\Product;

use App\Filters\Filters;
use App\Subcategory;

class ProductFiltersMap extends Filters
{
    public static function mappings()
    {
        $map = [
            'subcategory' => Subcategory::all()->pluck('slug', 'name'),
        ];

        return $map;
    }
}