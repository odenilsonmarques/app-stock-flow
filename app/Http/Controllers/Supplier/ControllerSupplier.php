<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateSupplier;

class ControllerSupplier extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(StoreUpdateSupplier $request)
    {
        $Supplier = Supplier::create($request->all());
        // dd($Supplier);

        //qd voltar verificar msg que é exibida quando não é uma imaem

        if($request->invoice)
         {
             $Supplier['invoice'] = $request->invoice->store('/notas');
         }
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
