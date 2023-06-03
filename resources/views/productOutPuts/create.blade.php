@extends('layouts.template')
@section('title','cadastro de produto')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="card mt-5">
                    <div class="card-header">Saída de Produto</div>
                    <div class="card-body">
                        <form action="{{ route('productsoutputs.store')}}" method="post">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="name" class="form-label">Produto</label>
                                    <select name="product_id" class="form-select" required>
                                        <option value="">Selecione</option>
                                        @foreach($products as $product)
                                            <option value="{{$product['id']}}">{{$product['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <label for="name" class="form-label">Tipo de saída</label>
                                    <select name="typeOutPut" class="form-select" required>
                                        <option value="">Selecione</option>
                                        @foreach($typeOutPuts as $typeOutPut)
                                            <option value="{{$typeOutPut}}">{{$typeOutPut}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="amount_outPut" class="form-label">Quantidade</label>
                                    <input type="number"  name="amount_outPut"  id="amount_outPut" class="form-control" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="date_outPut" class="form-label">Data</label>
                                    <input type="date"  name="date_outPut"  id="date_outPut" class="form-control" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="destiny" class="form-label">Orgão / Secretaria</label>
                                    <input type="text"  name="destiny"  id="destiny" class="form-control" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <label for="responsible_for_leaving" class="form-label">Responsável pela saída</label>
                                    <input type="text" name="responsible_for_leaving" id="responsible_for_leaving" cols="" rows="2" class="form-control">
                                </div>

                                <div class="col-lg-6 mb-3">
                                    <label for="responsible_for_receiving" class="form-label">Responsável por receber</label>
                                    <input type="text" name="responsible_for_receiving" id="responsible_for_receiving" cols="" rows="2" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-5">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" class="btn btn-success">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection