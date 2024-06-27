<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Supplier;
use Illuminate\Http\Request;
use PDF;

class ReportController extends Controller
{
    // generate report in pdf
    public function generateReport(Request $request)
    {

        $dataSuppliers = Supplier::all();
        $data = [
            'title' => 'Lista de fornecedores',
            'date' => date('m/d/Y'),
            'suppliers' => $dataSuppliers
        ];

        $pdf = PDF::loadView('reports.reportSupplier', $data);
        return $pdf->stream('lista de fornecedores.pdf');
    }

    public function generateReportProduct(Request $request)
    {
        $dataProducts = Product::all();
        $datas = [
            'title' => 'Lista de produtos',
            'date' => date('m/d/Y'),
            'products' => $dataProducts
        ];

        $pdf = PDF::loadView('reports.reportProduct', $datas);
        return $pdf->stream('lista de produtos.pdf');
    }




    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
