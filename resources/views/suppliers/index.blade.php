@extends('layouts.template')
@section('title','fornecedores')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <h1 class="suppliers">Fornecedores</h1>
                <div class="table-responsive">
                    <table class="table table table-striped table-hover">
                        <thead class="table header-table">
                            <tr>
                                <th>#</th>
                                <th>Fornecedor</th>
                                <th>Cnpj</th>
                                <th>Telefone</th>
                                <th>
                                    Ações
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($suppliers as $supplier)
                                <tr>
                                    <td>{{$supplier->id}}</td>
                                    <td>{{$supplier->name}}</td>
                                    <td>{{$supplier->cnpj}}</td>
                                    <td>{{$supplier->telefone}}</td>
                                    <td>
                                        <a href="#" class="btn btn-outline-secondary btn-sm">Editar</a>
                                        <a href="#" class="btn btn-outline-danger btn-sm">Excluir</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection