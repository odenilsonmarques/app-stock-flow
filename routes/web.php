<?php

use App\Http\Controllers\Supplier\ControllerSupplier;
use App\Http\Controllers\Product\ControllerProduct;
use App\Http\Controllers\ProductOutPut\ControllerProductOutPut;
use Illuminate\Support\Facades\Route;


Route::get('/suppliers',[ControllerSupplier::class,'create'])->name('supplier.create');
Route::post('/suppliers',[ControllerSupplier::class,'store'])->name('supplier.store');
Route::get('/suppliers/index',[ControllerSupplier::class,'index'])->name('supplier.index');

Route::get('/products',[ControllerProduct::class,'create'])->name('product.create');
Route::post('/products',[ControllerProduct::class,'store'])->name('product.store');
Route::get('/products/index',[ControllerProduct::class,'index'])->name('product.index');

Route::get('/productsoutputs',[ControllerProductOutPut::class,'create'])->name('productsoutputs.create');
Route::post('/productsoutputs',[ControllerProductOutPut::class,'store'])->name('productsoutputs.store');
Route::get('/productsoutputs/index',[ControllerProductOutPut::class, 'index'])->name('productsoutputs.index');



Route::get('/', function () {
    return view('welcome');
});
