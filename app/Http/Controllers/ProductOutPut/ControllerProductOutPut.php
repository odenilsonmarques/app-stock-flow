<?php

namespace App\Http\Controllers\ProductOutPut;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductOutPut;
use App\Http\Requests\StoreUpdateProductOutPut;
use Exception;

class ControllerProductOutPut extends Controller
{
   
    public function index()
    {
        $productOutPuts = ProductOutPut::all();
        return view('productOutPuts.index', compact('productOutPuts'));
    }

    public function create()
    {
        $typeOutPuts = ["Caixa", "Unidade", "Pacote", "Resma", "Quilograma", "Litro", "Metro", "Pallet", "Galão", "Kit", "Conjunto", "Rolo", "Dúzia", "Engradado", "Cartela"];
        $products = Product::all();
        return view('productOutPuts.create',compact('products','typeOutPuts'));
    }


    public function store(StoreUpdateProductOutPut $request)
    {
        $product_id = $request->merge(['product_id']); 
        ProductOutPut::create($request->all());

        //atualizando o valor da coluna comfirm_amount da tabela product, apos a subtração com acoluna amount_outPut
        $product = Product::find($product_id->product_id);

        $availableQuantity = $product->confirm_amount;

        if ($request->amount_outPut > $product->confirm_amount) {
            $mensagemErro = sprintf('Estoque indisponível. Quantidade disponível: %d', $availableQuantity);
            return redirect()->back()->withErrors($mensagemErro)->withInput();
            // return redirect()->back()->withErrors($validator)->withInput();
        }

        $product->confirm_amount -= $product_id->amount_outPut;

        $product->save();
    }


    
    public function show(string $id)
    {
        //
    }

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
