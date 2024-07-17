<?php

use App\Http\Controllers\Supplier\ControllerSupplier;
use App\Http\Controllers\Product\ControllerProduct;
use App\Http\Controllers\ProductOutPut\ControllerProductOutPut;
use App\Http\Controllers\Site\ControllerSite;
use App\Http\Controllers\Dashboard\ControllerDashboard;
use App\Http\Controllers\Report\ReportController;
use Illuminate\Support\Facades\Route;


Route::get('/suppliers',[ControllerSupplier::class,'create'])->name('supplier.create');
Route::post('/suppliers',[ControllerSupplier::class,'store'])->name('supplier.store');
Route::get('/suppliers/index',[ControllerSupplier::class,'index'])->name('supplier.index');
Route::any('/suppliers/search',[ControllerSupplier::class,'search'])->name('supllier.search');
Route::get('/suppliers/{id}/detail', [ControllerSupplier::class,'show'])->name('supplier.show');


Route::get('/products',[ControllerProduct::class,'create'])->name('product.create');
Route::post('/products',[ControllerProduct::class,'store'])->name('product.store');
Route::get('/products/index',[ControllerProduct::class,'index'])->name('product.index');
Route::any('/products/search',[ControllerProduct::class,'search'])->name('product.search');


Route::get('/productsoutputs',[ControllerProductOutPut::class,'create'])->name('productsoutputs.create');
Route::post('/productsoutputs',[ControllerProductOutPut::class,'store'])->name('productsoutputs.store');
Route::get('/productsoutputs/index',[ControllerProductOutPut::class, 'index'])->name('productsoutputs.index');
Route::any('/productsoutputs/search',[ControllerProductOutPut::class,'search'])->name('productsoutputs.search');


Route::get('/', [ControllerSite::class, 'index'])->name('index');

Route::get('/dashboard',[ControllerDashboard::class,'index'])->name('dashboard.index');


Route::get('/report/suppliers', [ReportController::class,'generateReport'])->name('generateReport.report');
Route::get('/report/products', [ReportController::class,'generateReportProduct'])->name('generateReportProduct.report');
Route::get('/report/productsOutPut', [ReportController::class,'generateReportProductOutPut'])->name('generateReportProductOutPut.report');





// Route::get('/', function () {
//     return view('welcome');
// });



//route to authenticate

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
