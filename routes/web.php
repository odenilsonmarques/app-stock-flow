<?php

use App\Http\Controllers\Supplier\ControllerSupplier;
use Illuminate\Support\Facades\Route;


Route::get('/suppliers',[ControllerSupplier::class,'create'])->name('supplier.create');
Route::post('/suppliers',[ControllerSupplier::class,'store'])->name('supplier.store');




Route::get('/', function () {
    return view('welcome');
});
