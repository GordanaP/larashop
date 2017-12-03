<?php

namespace App;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected $hidden = ['id', 'created_at', 'updated_at'];

    protected static function boot()
    {
        parent::boot();

        return static::observe(CategoryObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategories()
    {
        return $this->hasMany(Subcategory::class);
    }

    public function products()
    {
        return $this->hasManyThrough(Product::class, Subcategory::class);
    }
}
