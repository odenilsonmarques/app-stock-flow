<?php

namespace App\Http\Controllers\DeliveryMen;

use App\Http\Controllers\Controller;
use App\Models\Deliverymen;
use Illuminate\Http\Request;

class ControllerDeliveryMen extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    public function create()
    {
        return view('deliverymens.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        Deliverymen::create($data);

        return redirect()->route('deliverymens.create')
        ->with('messageCreate', 'Entregador cadastrado com sucesso !');
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
}
