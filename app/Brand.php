<?php

namespace App;

use App\Observers\BrandObserver;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        return static::observe(BrandObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getFormattedNameAttribute()
    {
        return ucwords($this->name);
    }

}
