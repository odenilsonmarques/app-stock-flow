@extends('layouts.template')
@section('title', 'cadastro de fornecedor')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-lg-12">
                @if ($errors->any())
                    <div class="alert alert-danger mt-3">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('supplier.store') }}" method="post" enctype="multipart/form-data">
                    @csrf<!--csrf toquem de segurnça padrao do laravel para envio de requisao-->
                    <div class="card mt-5">
                        <div class="card-header d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-person-fill me-2" viewBox="0 0 16 16">
                                <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                            </svg>
                            Dados Principais
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="name" class="form-label required">Nome do Fornecedor</label>
                                    <input type="name" name="name" id="name" class="form-control"
                                        value="{{ old('name') }}" placeholder="Digite aqui" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg mb-3">
                                    <label for="type_supplier" class="form-label required">Tipo de fonercedor</label>
                                    <select id="type_supplier" name="type_supplier" class="form-select" required>
                                        <option value="" {{ old('type_supplier') == '' ? 'selected' : '' }}>Selecione
                                        </option>
                                        <option value="Fisica" {{ old('type_supplier') == 'Fisica' ? 'selected' : '' }}>
                                            Pessoa física</option>
                                        <option value="Juridica" {{ old('type_supplier') == 'Juridica' ? 'selected' : '' }}>
                                            Pessoa jurídica</option>
                                    </select>
                                </div>

                                <div class="col-lg mb-3">
                                    <label for="cpf_cnpj" class="form-label required">Número do documento</label>
                                    <input type="text" name="cpf_cnpj" id="cpf_cnpj" class="form-control"
                                        value="{{ old('cpf_cnpj') }}" placeholder="Digite aqui"
                                        title="Digite apenas números" required>
                                        <span id="error-message" style="color:red;display:none;">Número inválido!</span>
                                </div>

                                <div class="col-lg mb-3">
                                    <label for="phone" class="form-label required">Telefone</label>
                                    <input type="text" name="phone" id="phone" class="form-control"
                                        value="{{ old('phone') }}" placeholder="Digite aqui" title="Digite apenas números"
                                        required>
                                </div>

                                <div class="col-lg mb-3">
                                    <label for="invoice" class="form-label">Nota Fiscal</label>
                                    <input type="file" name="invoice" id="invoice" class="form-control">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <label for="email" class="form-label">Email</label>
                                    <input type="email" name="email" id="email" class="form-control"
                                        value="{{ old('email') }}" placeholder="Digite aqui" title="Digite aqui">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card mt-2">
                        <div class="card-header  d-flex align-items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-geo-alt-fill me-2" viewBox="0 0 16 16">
                                <path
                                    d="M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10m0-7a3 3 0 1 1 0-6 3 3 0 0 1 0 6" />
                            </svg>
                            Endereço
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4 mb-3">
                                    <label for="cep" class="form-label">Cep</label>
                                    <input type="text" name="cep" id="cep" class="form-control"
                                        value="{{ old('cep') }}" placeholder="Digite aqui" title="Digite apenas números">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="road" class="form-label">Rua</label>
                                    <input type="text" name="road" id="road" class="form-control"
                                        value="{{ old('road') }}" placeholder="Digite aqui"
                                        title="Digite apenas números">
                                </div>

                                <div class="col-lg-4 mb-3">
                                    <label for="identification_number" class="form-label">Nº</label>
                                    <input type="text" name="identification_number" id="identification_number"
                                        class="form-control" value="{{ old('identification_number') }}"
                                        placeholder="Digite aqui" title="Digite apenas números">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-lg-4 mb-3">
                                    <label for="complement" class="form-label">Complemento</label>
                                    <input type="text" name="complement" id="complement" class="form-control"
                                        value="{{ old('complement') }}" placeholder="Digite aqui"
                                        title="Digite apenas números">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="distric" class="form-label">Bairro</label>
                                    <input type="text" name="district" id="district" class="form-control"
                                        value="{{ old('district') }}" placeholder="Digite aqui"
                                        title="Digite apenas números">
                                </div>
                                <div class="col-lg-4 mb-3">
                                    <label for="city" class="form-label">Cidade</label>
                                    <input type="text" name="city" id="city" class="form-control"
                                        value="{{ old('city') }}" placeholder="Digite aqui"
                                        title="Digite apenas números">
                                </div>
                            </div>
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
@endsection
