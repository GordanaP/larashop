<?php

namespace App\Observers;

use App\Subcategory;

class SubcategoryObserver
{
    public function creating(Subcategory $subcategory)
    {
        $subcategory->slug = str_slug($subcategory->name);
    }


    public function updating(Subcategory $subcategory)
    {
        $subcategory->slug = str_slug($subcategory->name);
    }
}