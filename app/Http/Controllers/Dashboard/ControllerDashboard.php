<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOutPut;
use App\Models\Supplier;

class ControllerDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::all();

        $products = Product::all();

        $productsAvailables = Product::where('confirm_amount' ,'>', 0)->get();

        // dd($productsAvailables);

        $quantitySuppliers = Supplier::count();

        $quantityProducts = Product::count();

        $quantityProductsAvailables = Product::where('confirm_amount' ,'>', 0)->count();

        $totalProductsMinimumAmount = Product::where('confirm_amount' ,'=', 10)->count();

        $totalProductsMinimumAmount = Product::where('confirm_amount' ,'=', 10)->count();

        $totalProductsBelowMinimumAmount = Product::where('confirm_amount', '>', 0)->where('confirm_amount', '<', 10)->count();

        $totalProductsWithZeroStock = Product::where('confirm_amount', '=', 0)->count();



        
        //  dd($totalProductsWithZeroStock);
        

        // dd($totalSuppliers);

        return view('dashboard.index',[
            'quantitySuppliers' => $quantitySuppliers,
            'quantityProducts' => $quantityProducts,
            'quantityProductsAvailables' => $quantityProductsAvailables,
            'totalProductsMinimumAmount' => $totalProductsMinimumAmount,
            'totalProductsBelowMinimumAmount' => $totalProductsBelowMinimumAmount,
            'totalProductsWithZeroStock' => $totalProductsWithZeroStock ,
            'suppliers' => $suppliers,
            'products' => $products,
            'productsAvailables' => $productsAvailables
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
