@extends('layouts.template')
@section('title','cadastro de produto')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                @if($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="card mt-5">
                    <div class="card-header">Cadastro de Produto</div>
                    <div class="card-body">
                        <form action="{{ route('product.store')}}" method="post">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="name" class="form-label">Fornecedor</label>
                                    <select name="supplier_id" class="form-select" required>
                                        <option value="">Selecione</option>
                                        @foreach($suppliers as $supplier)
                                            <option value="{{$supplier['id']}}" {{ old('supplier_id') == $supplier['id'] ? 'selected' : '' }}>{{$supplier['name']}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <label for="name" class="form-label">Produto</label>
                                    <input type="name"  name="name" id="name-product" class="form-control" placeholder="Digite somente letras" value="{{old('name')}}" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="amount" class="form-label">Quantidade</label>
                                    <input type="number"  name="amount"  id="amount" class="form-control"  value="{{old('amount')}}" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="confirm_amount" class="form-label">Confirme a Quantidade</label>
                                    <input type="number"  name="confirm_amount"  id="confirm_amount" class="form-control" value="{{old('confirm_amount')}}" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="minimum_amount" class="form-label">Quantidade Mínima</label>
                                    <input type="number"  name="minimum_amount"  id="minimum_amount" class="form-control" value="{{old('minimum_amount')}}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="description" class="form-label">Descrição</label>
                                    <textarea name="description" id="description" cols="" rows="2" class="form-control" required>{{old('description')}}</textarea>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mt-5">
                                    <button class="btn btn-danger"><a href="#">CANCELAR</a></button>
                                    <button type="submit" id="submitBtn" class="btn btn-success">CADASTRAR</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection