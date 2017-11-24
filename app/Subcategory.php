<?php

namespace App;

use App\Observers\SubcategoryObserver;
use Illuminate\Database\Eloquent\Model;

class Subcategory extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        return static::observe(SubcategoryObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getNameFormattedAttribute()
    {
        return ucwords($this->name);
    }
}
