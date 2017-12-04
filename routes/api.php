<?php

use Illuminate\Http\Request;

// User
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// Product
Route::get('/products/{category}', 'Api\ProductController@index');
Route::get('/products/{category}/filters', 'Api\ProductController@filters');