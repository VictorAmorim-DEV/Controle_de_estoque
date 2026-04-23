<?php

use App\Models\Suppliers;
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

Route::get('produtos/adicionar', function () {
    $suppliers=Suppliers::all();
    return view('products.add_product', compact('suppliers'));
});

Route::get('stock', function () {
    return view('stock.stock');
});

Route::get('suppliers', function () {
    return view('suppliers.suppliers');
});