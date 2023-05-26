<?php

use App\Http\Controllers\Supplier\ControllerSupplier;
use App\Http\Controllers\Product\ControllerProduct;
use Illuminate\Support\Facades\Route;


Route::get('/suppliers',[ControllerSupplier::class,'create'])->name('supplier.create');
Route::post('/suppliers',[ControllerSupplier::class,'store'])->name('supplier.store');

Route::get('/products',[ControllerProduct::class,'create'])->name('product.create');
Route::post('/products',[ControllerProduct::class,'store'])->name('product.store');




Route::get('/', function () {
    return view('welcome');
});
