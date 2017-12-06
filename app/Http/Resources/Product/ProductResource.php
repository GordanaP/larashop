<?php

namespace App\Http\Resources\Product;

use Illuminate\Http\Resources\Json\Resource;

class ProductResource extends Resource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'slug' => $this->slug,
            'description' => $this->description,
            'price' => $this->price,
            'subacategory' => $this->subcategory->formatted_name,
            'category' => $this->subcategory->category->formatted_name,
            'category_slug' => $this->subcategory->category->slug,
            'brand' => $this->brand->formatted_name,
        ];
    }
}
