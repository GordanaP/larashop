<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Filters\Product\ProductFilters;
use App\Filters\Product\ProductFiltersMap;
use App\Http\Controllers\Controller;
use App\Http\Resources\Product\ProductCollection;
use App\Http\Resources\Product\ProductResource;
use App\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \App\Product  $product, App\Filters\Product\ProductFilters $filters
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, ProductFilters $filters)
    {
        $subcat_ids = $category->subcategories->pluck('id');

        return new ProductCollection(
            Product::with('subcategory', 'brand', 'subcategory.category')
                ->whereIn('subcategory_id', $subcat_ids)
                ->filter($filters)
                ->paginate(8)
        );
    }


    /**
     * Display a listing of the resource filters.
     *
     * @return \Illuminate\Http\Response
     */
    public function filters(Category $category)
    {
        return response([
            'data' => ProductFiltersMap::mappings()
        ]);
    }
}
