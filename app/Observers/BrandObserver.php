<?php

namespace App\Observers;

use App\Brand;

class BrandObserver
{
    public function creating(Brand $brand)
    {
        $brand->slug = str_slug($brand->name);
    }


    public function updating(Brand $brand)
    {
        $brand->slug = str_slug($brand->name);
    }
}