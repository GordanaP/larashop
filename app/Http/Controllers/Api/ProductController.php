<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Filters\Product\ProductFilters;
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
     * @return \Illuminate\Http\Response
     */
    public function index(Category $category, ProductFilters $filters)
    {
        $subcat_ids = $category->subcategories->pluck('id');

        return new ProductCollection(Product::with('subcategory', 'subcategory.category')->whereIn('subcategory_id', $subcat_ids)->filter($filters)->paginate(8));
    }
}
