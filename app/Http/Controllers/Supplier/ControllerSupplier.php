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
        $suppliers = Supplier::paginate(7);
        return view('suppliers.index', compact('suppliers'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(StoreUpdateSupplier $request)
    {

        // dd($request->file('invoice')->isValid());

        $data = $request->except('invoice');

        if($request->invoice)
        {
            
            $data['invoice'] = $request->invoice->store('notas');
        }

        Supplier::create($data);

        return redirect()->route('supplier.index')
        ->with('messageCreate', 'Fornecedor cadastrado com sucesso !');
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
