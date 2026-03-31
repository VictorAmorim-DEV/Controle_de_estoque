<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StockController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::post('addStockItems', [StockController::class, 'addStockItems'])->name('addStockItems');
Route::get('listStockItems', [StockController::class, 'listStockItems'])->name('listStockItems');
Route::put('updateStockItems', [StockController::class, 'updateStockItems'])->name('updateStockItems');
Route::delete('deleteStockItems', [StockController::class, 'deleteStockItems'])->name('deleteStockItems');