<?php

use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Product
Route::get('products/{category}', 'ProductController@index')->name('products.index');
Route::get('products/{category}/{product}', 'ProductController@show')->name('products.show');
Route::resource('products/', 'ProductController', [
    'except' => ['index', 'show']
]);



// Redirects all non-existing routes to index route
Route::any('{query}', function() {
    return redirect('/');
})->where('query', '.*');