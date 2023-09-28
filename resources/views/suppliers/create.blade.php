@extends('layouts.template')
@section('title', 'cadastro de fornecedor')

@section('content')
    <div class="container">
        <div class="row mt-5">
            {{-- <div class="col-lg-3 mt-5">
                <img src="{{asset('assets/img/supplier.svg')}}" width="250px" height="300px" alt="cadastro lançamento">
            </div> --}}
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
                    <div class="card-header">Cadastro de Fornecedor</div>
                    <div class="card-body">
                        <form action="{{ route('supplier.store')}}" method="post" enctype="multipart/form-data">
                            @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="name" class="form-label required">Nome do Fornecedor</label>
                                    <input type="name" name="name" id="name" class="form-control" value="{{old('name')}}" placeholder="Digite aqui" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-3 mb-3">
                                    <label for="cnpj" class="form-label required">Cnpj</label>
                                    <input type="cnpj"  name="cnpj" id="cnpj" class="form-control" value="{{old('cnpj')}}" placeholder="Digite aqui" title="Digite apenas números" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="phone" class="form-label required">Telefone</label>
                                    <input type="phone"  name="phone"  id="phone" class="form-control" value="{{old('phone')}}" placeholder="Digite aqui" title="Digite apenas números" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="date" class="form-label required">Data</label>
                                    <input type="date"  name="date"  id="date" class="form-control" value="{{old('date')}}" required>
                                </div>

                                <div class="col-lg-3 mb-3">
                                    <label for="invoice" class="form-label">Nota Fiscal</label>
                                    <input type="file"  name="invoice"  id="invoice" class="form-control">
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