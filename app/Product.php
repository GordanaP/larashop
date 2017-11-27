<?php

namespace App;

use App\Observers\ProductObserver;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'description', 'price'];

    protected static function boot()
    {
        parent::boot();

        return static::observe(ProductObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function subcategory()
    {
        return $this->belongsTo(Subcategory::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function getPriceAttribute($value)
    {
        return round($value/100);
    }

    public function scopeFilter($query, $filters)
    {
        return $filters->apply($query);
    }
}
