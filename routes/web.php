<?php

use Illuminate\Support\Facades\Route;

Auth::routes(['register'=>false]);

Route::get('/{page}', [App\Http\Controllers\HomeController::class, 'index']);

// Add Cashier
Route::post('addCashier', [App\Http\Controllers\CashierController::class, 'addCashier'])->name('addCashier');

// Supplier
Route::post('addSupplier', [App\Http\Controllers\SupplierController::class, 'addSupplier'])->name('addSupplier');
Route::post('supplierUpdate', [App\Http\Controllers\SupplierController::class, 'supplierUpdate']);
Route::post('supplierDelete', [App\Http\Controllers\SupplierController::class, 'supplierDelete']);



// Stock
Route::post('addStock', [App\Http\Controllers\StocksController::class, 'addStock'])->name('addStock');
Route::post('stockUpdate', [App\Http\Controllers\StocksController::class, 'stockUpdate']);
Route::post('stockDelete', [App\Http\Controllers\StocksController::class, 'stockDelete']);


// Sale Product
Route::post('check', [App\Http\Controllers\SaleController::class, 'check']);
Route::post('sale', [App\Http\Controllers\SaleController::class, 'sale'])->name('SaleProduct');
Route::get('clean/{id}', [App\Http\Controllers\SaleController::class, 'clean']);




