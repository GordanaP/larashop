<?php

namespace App\Filters\Product;

use App\Brand;
use App\Category;
use App\Filters\Filters;
use App\Subcategory;

class ProductFiltersMap extends Filters
{
    public static function mappings()
    {
        $category = Category::whereSlug(request('category.slug'))->first();
        $category_id = $category->id;
        $brand_ids = $category->products->pluck('brand_id')->unique();

        $map = [
            'subcategory' => Subcategory::where('category_id', $category_id)->pluck('slug', 'name'),
            'brand' => Brand::whereIn('id', $brand_ids)->pluck('slug', 'name'),
        ];

        return $map;
    }
}