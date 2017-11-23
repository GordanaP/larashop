<?php

namespace App;

use App\Observers\CategoryObserver;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name'];

    protected static function boot()
    {
        parent::boot();

        return static::observe(CategoryObserver::class);
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
