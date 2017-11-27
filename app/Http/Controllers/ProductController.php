<?php

namespace App\Http\Controllers;

use App\{Brand, Category, Product};
use App\Filters\Product\ProductFilters;
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
        $product_ids = $category->products->pluck('id');
        $products = Product::whereIn('id', $product_ids)->filter($filters)->paginate(8);

        $brand_ids = $category->products->pluck('brand_id');
        $brands = Brand::whereIn('id', $brand_ids)->get();

        return view('products.index', compact('products', 'category', 'brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    /**
    * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function category(Category $category)
    {
        $products = $category->products;
        $subcategories = $category->subcategories;

        return view('products.category', compact('products', 'subcategories'));
    }
}
