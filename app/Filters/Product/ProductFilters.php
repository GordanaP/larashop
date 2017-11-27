<?php

namespace App\Filters\Product;

use App\Brand;
use App\Category;
use App\Filters\Filters;
use App\Subcategory;
use Illuminate\Database\Eloquent\Builder;

class ProductFilters extends Filters
{
    protected $filters = ['category', 'subcategory', 'brand'];

    protected function category($slug)
    {
        $category = Category::whereSlug($slug)->first();

        if($category)
        {
            $subcategory_ids = $category->subcategories->pluck('id')->toArray();

            return $this->builder->whereHas('subcategory', function() use($subcategory_ids){
                $this->builder->whereIn('subcategory_id', $subcategory_ids);
            });
        }
    }

    protected function subcategory($slug)
    {
        $subcategory = Subcategory::whereSlug($slug)->first();

        if($subcategory)
        {
            return $this->builder->whereHas('subcategory', function() use($subcategory){
                $this->builder->where('subcategory_id', $subcategory->id);
            });
        }
    }

    protected function brand($slug)
    {
        $brand = Brand::whereSlug($slug)->first();

        if($brand)
        {
            return $this->builder->whereHas('brand', function() use($brand){
                $this->builder->where('brand_id', $brand->id);
            });
        }
    }
}
