<?php

namespace App\Filters\Product;

use App\Category;
use App\Filters\Filters;
use App\Subcategory;
use Illuminate\Database\Eloquent\Builder;

class ProductFilters extends Filters
{
    protected $filters = ['subcategory'];

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
}
