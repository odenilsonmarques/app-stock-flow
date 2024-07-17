@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ route('supplier.store') }}" method="POST">
            @csrf
            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-pencil-square"></i> Dados gerais
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="tipoFornecedor" class="form-label">Tipo de fornecedor*</label>
                            <select class="form-select" id="tipoFornecedor" name="tipoFornecedor">
                                <option selected>Selecione</option>
                                <option value="Pessoa fisica">Pessoa física</option>
                                <option value="Pessoa juridica">Pessoa jurídica</option>
                            </select>
                        </div>
                        <div class="col-md-6">
                            <label for="situacao" class="form-label">Situação</label>
                            <select class="form-select" id="situacao" name="situacao">
                                <option value="Ativo" selected>Ativo</option>
                                <option value="Inativo">Inativo</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label for="nome" class="form-label">Nome*</label>
                            <input type="text" class="form-control" id="nome" name="nome"
                                placeholder="Digite o nome" required>
                        </div>
                        <div class="col-md-6">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email"
                                placeholder="Digite o email">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="telefone" class="form-label">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone"
                                placeholder="Digite o telefone">
                        </div>
                        <div class="col-md-4">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular"
                                placeholder="Digite o celular">
                        </div>
                    </div>
                </div>
            </div>

            <div class="card mb-4">
                <div class="card-header">
                    <i class="bi bi-map"></i> Endereços
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-md-4">
                            <label for="tipoEndereco" class="form-label">Tipo</label>
                            <input type="text" class="form-control" id="tipoEndereco" name="tipoEndereco"
                                placeholder="Digite o tipo">
                        </div>
                        <div class="col-md-4">
                            <label for="cep" class="form-label">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep"
                                placeholder="Digite o CEP">
                        </div>
                        <div class="col-md-4">
                            <label for="logradouro" class="form-label">Logradouro</label>
                            <input type="text" class="form-control" id="logradouro" name="logradouro"
                                placeholder="Digite o logradouro">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-2">
                            <label for="numero" class="form-label">Número</label>
                            <input type="text" class="form-control" id="numero" name="numero"
                                placeholder="Digite o número">
                        </div>
                        <div class="col-md-4">
                            <label for="complemento" class="form-label">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento"
                                placeholder="Digite o complemento">
                        </div>
                        <div class="col-md-4">
                            <label for="bairro" class="form-label">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro"
                                placeholder="Digite o bairro">
                        </div>
                        <div class="col-md-4">
                            <label for="cidadeUf" class="form-label">Cidade/UF</label>
                            <input type="text" class="form-control" id="cidadeUf" name="cidadeUf"
                                placeholder="Digite a cidade e UF">
                        </div>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-12 text-end">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>
            </div>
        </form>
    </div>
@endsection
