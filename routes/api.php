<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\ProductsController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

//Rotas para o Stock
Route::post('addStockItems', [StockController::class, 'addStockItems'])->name('addStockItems');
Route::get('listStockItems', [StockController::class, 'listStockItems'])->name('listStockItems');
Route::put('updateStockItems', [StockController::class, 'updateStockItems'])->name('updateStockItems');
Route::delete('deleteStockItems', [StockController::class, 'deleteStockItems'])->name('deleteStockItems');

//Rotas para os Suppliers
Route::post('addSuppliers', [SuppliersController::class, 'addSuppliers'])->name('addSuppliers');
Route::get('listSuppliers', [SuppliersController::class, 'listSuppliers'])->name('listSuppliers');
Route::put('updateSuppliers', [SuppliersController::class, 'updateSuppliers'])->name('updateSuppliers');
Route::delete('deleteSuppliers', [SuppliersController::class, 'deleteSuppliers'])->name('deleteSuppliers');

//Rotas para os Products
Route::post('addProduct', [ProductsController::class, 'addProduct'])->name('addProduct');
Route::get('listProduct', [ProductsController::class, 'listProduct'])->name('listProduct');
Route::put('updateProduct', [ProductsController::class, 'updateProduct'])->name('updateProduct');
Route::delete('deleteProduct', [ProductsController::class, 'deleteProduct'])->name('deleteProduct');