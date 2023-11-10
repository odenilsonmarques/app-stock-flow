<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOutPut;
use App\Models\Supplier;
use DB;

class ControllerDashboard extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recuperation quantity

        $quantitySuppliers = Supplier::count();

        $quantityProducts = Product::count();

        $quantityProductsAvailables = Product::where('confirm_amount', '>', 0)->count();

        $quantityProductsMinimums = Product::where('confirm_amount', '=', 10)->count();

        $quantityProductsBelowMinimums = Product::where('confirm_amount', '>', 0)->where('confirm_amount', '<', 10)->count();

        $quantityProductsWithZeroStocks = Product::where('confirm_amount', '=', 0)->count();


        //recuperation is data in colletion

        $suppliers = Supplier::all();

        $products = Product::all();

        $productsAvailables = Product::where('confirm_amount', '>', 0)->get();

        $productsQuantityMinimums = Product::where('confirm_amount', '=', 10)->get();

        $productsQuantityBelowMinimums = Product::where('confirm_amount', '>', 0)->where('confirm_amount', '<', 10)->get();

        $productsQuantityWithZeroStocks = Product::where('confirm_amount', '=', 0)->get();


        //Report
        $data = Product::select(
            DB::raw('MONTH(created_at) as month'),
            DB::raw('count(id) as total_quantity'),
            DB::raw('(SELECT count(id) FROM product_out_puts WHERE MONTH(created_at) = month) as total_output')
        )
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->get();

        // Cria um array associativo com os dados por mês
        $monthlyData = $data->pluck('total_quantity', 'month')->all();

        // Array fixo com os nomes dos meses
        $months = ["Janeiro", "Fevereiro", "Março", "Abril", "Maio", "Junho", "Julho", "Agosto", "Setembro", "Outubro", "Novembro", "Dezembro"];

        // Cria um array de quantidades correspondentes aos meses
        $quantities = [];
        foreach (range(1, count($months)) as $month) {
            $quantities[] = $monthlyData[$month] ?? 0;
        }



        return view('dashboard.index', [
            'quantitySuppliers' => $quantitySuppliers,
            'quantityProducts' => $quantityProducts,
            'quantityProductsAvailables' => $quantityProductsAvailables,
            'quantityProductsMinimums' => $quantityProductsMinimums,
            'quantityProductsBelowMinimums' => $quantityProductsBelowMinimums,
            'quantityProductsWithZeroStocks' => $quantityProductsWithZeroStocks,
            'suppliers' => $suppliers,
            'products' => $products,
            'productsAvailables' => $productsAvailables,
            'productsQuantityMinimums' => $productsQuantityMinimums,
            'productsQuantityBelowMinimums' => $productsQuantityBelowMinimums,
            'productsQuantityWithZeroStocks' => $productsQuantityWithZeroStocks,
            // 'data' => $data,
            'months' => json_encode($months),
            'quantities' => json_encode($quantities)
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
