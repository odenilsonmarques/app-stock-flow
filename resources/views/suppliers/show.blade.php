@extends('layouts.template')
@section('title', 'fornecedores')

@section('content')
    <div class="container">


        <div class="card supplier-datas">
            <div class="card-header">
                Dados do fornecedor
            </div>
            <div class="card-body">
                <h5 class="card-title"><span class="fw-bold me-1">Nome: </span>{{ $suppliers->name }}</h5><hr>
                <p class="card-text"><span class="fw-bold me-1">Pessoa:</span> {{ $suppliers->type_supplier }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Nº documento:</span> {{ $suppliers->cpf_cnpj }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Telefone:</span> {{ $suppliers->phone }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Data de cadastro:</span>{{ date('d/m/Y', strtotime($suppliers->created_at)) }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Email:</span>{{ optional($suppliers)->email ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Cep:</span>{{ optional($suppliers)->cep ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Rua:</span>{{ optional($suppliers)->road ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Número:</span>{{ optional($suppliers)->identification_number ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Complemento:</span>{{ optional($suppliers)->complement ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Cidade:</span>{{ optional($suppliers)->city ?? 'Dado não informado' }}</p><hr>
                <p class="card-text"><span class="fw-bold me-1">Bairro:</span>{{ optional($suppliers)->district ?? 'Dado não informado' }}</p>
                <a href="{{route('supplier.index')}}" class="btn btn-primary">Retornar</a>
            </div>
        </div>
    </div>
@endsection
