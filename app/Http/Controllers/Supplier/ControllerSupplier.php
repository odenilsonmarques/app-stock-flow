<?php

namespace App\Http\Controllers\Supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Http\Requests\StoreUpdateSupplier;

class ControllerSupplier extends Controller
{
    private $totalPage = 3;

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $suppliers = Supplier::paginate($this->totalPage);
        // dd($suppliers);
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

    // Declando o objeto Supplier, pois vou precisar recuperar o metodo criado na model supplier
    public function search(Request $request, Supplier $supplier)
    {
        $dataForm = $request->all();

        $suppliers = $supplier->search($dataForm, $this->totalPage);

        return view('suppliers.index', compact('suppliers'));
    }
}
