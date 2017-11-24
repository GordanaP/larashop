<?php

use App\Product;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

//Product
Route::name('products.index')->get('products/{category?}', 'ProductController@index');
Route::resource('products', 'ProductController', [
    'except' => ['index']
]);
