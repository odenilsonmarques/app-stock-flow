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
    private $totalPage = 2;
   
    public function index()
    {
        $productOutPuts = ProductOutPut::paginate($this->totalPage);
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
        
        //updating comfirm_amount column value of tabela product, if the condition is satisfied
        $product = Product::find($product_id->product_id);

        $availableQuantity = $product->confirm_amount;

        if ($request->amount_outPut > $product->confirm_amount) {
            $mensagemErro = sprintf('Estoque indisponível. Quantidade disponível: %d', $availableQuantity);
            return redirect()->back()->withErrors($mensagemErro)->withInput();
        }

        $product->confirm_amount -= $product_id->amount_outPut;
        $product->save();

        ProductOutPut::create($request->all());
        return redirect()->route('productsoutputs.index')
        ->with('messageCreate', 'Saida de produto registrada com sucesso !');
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

    public function search(Request $request, ProductOutPut $productOutPut)
    {
        $dataForm = $request->all();

        $productOutPuts  = $productOutPut->searchProductOutPut($dataForm, $this->totalPage);

        return view('productOutPuts.index', compact('productOutPuts'));

    }

}
