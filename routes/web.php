<?php

use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', function () {
    return view('home.home');
});

Route::get('produtos', function () {
    return view('products.products');
});

Route::get('stock', function () {
    return view('stock.stock');
});

Route::get('suppliers', function () {
    return view('suppliers.suppliers');
});