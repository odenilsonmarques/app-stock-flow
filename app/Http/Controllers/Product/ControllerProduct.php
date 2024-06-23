<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Supplier; 
use App\Http\Requests\StoreUpdateProduct;

class ControllerProduct extends Controller
{
    private $totalPage = 3;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $countConfirmAmount = Product::where('confirm_amount', 0)->count(); //informa a quantidade de produtos esgotados
       
        $productsEmptys = Product::where('confirm_amount', 0)->get();//exibe todos os produtos esgotados que  serao exibidos no modal

        $products = Product::paginate($this->totalPage);

        return view('products.index', compact('products','countConfirmAmount','productsEmptys'));
    }

    public function create()
    {
        $suppliers = Supplier::orderBy('name')->get();
        return view('products.create', compact('suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUpdateProduct $request)
    {
        $request->merge(['supplier_id']); 
        // dd($teste);
        Product::create($request->all());
        return redirect()->route('product.index')
        ->with('messageCreate', 'Produto cadastrado com sucesso !');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
       
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

    // Declando o objeto Product, pois vou precisar recuperar o metodo(searchProduct) criado na model Product
    public function search(Request $request, Product $product){

        //display products with quantity equal zero in collunm confirm_amount. 
        //passando essa variavel aqui também, pois quando é feito uma busca caso esa variável não seja declarada aqui é gerado um erro
        $countConfirmAmount = Product::where('confirm_amount', 0)->count();

        //passando a variavel por causa do modal, pois quando é feito uma busca caso esa variável não seja declarada aqui é gerado um erro
        $productsEmptys = Product::where('confirm_amount', 0)->get();
        $dataForm = $request->all();

        $products = $product->searchProduct($dataForm, $this->totalPage);

        return view('products.index', compact('products','countConfirmAmount','productsEmptys'));

    }
}
