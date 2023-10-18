@extends('layouts.template')
@section('title', 'Produtos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (session('messageCreate'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                        <strong>{{ session('messageCreate') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row search-and-button">
            <div class="col-lg-6 col align-self-start">
                <div class="input-group">
                    <form action="{{ route('supllier.search') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="cnpj" id="cnpj" class="form-control inputSearch sm"
                                placeholder="Digite o nome do produto">

                            <div class="input-group-append ml-3">
                                <button type="submit" class="btn btn-outline-secondary inputSearch">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-end">
                @php
                    $countConfirmAmount = 0;
                    $countConfirmAmounttAndMinimumAmount = 0;
                @endphp
                @foreach ($products as $product)
                    @if ($product->confirm_amount == 0)
                        @php
                            $countConfirmAmount++;
                        @endphp
                    @endif

                    @if ($product->confirm_amount == $product->minimum_amount)
                        @php
                            $countConfirmAmounttAndMinimumAmount++;
                        @endphp
                    @endif
                @endforeach

                <p class="warning-product mt-2">
                    <a href="#">Produtos esgotados {{ $countConfirmAmount }}</a>
                </p>

                <p class="warning-product mt-2">
                    <a href="#">Produtos com quantidade minima {{ $countConfirmAmounttAndMinimumAmount }}</a>
                </p>

                <button type="button" class="button-new-register btn-sm"><a href="{{ route('product.create') }}">Novo
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg></a>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive mt-2">
                <table class="table table table-hover">
                    <thead class="table header-table">
                        <tr>
                            <th>Produto</th>
                            <th>Fornecedor</th>
                            <th>Qtd de entrada</th>
                            <th>Qtd em estoque</th>
                            <th>Qtd minima</th>
                            <th>Data</th>
                            <th>
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product)
                            <tr
                                @if ($product->confirm_amount == $product->minimum_amount) class="red-row" 
                                    @elseif($product->confirm_amount < $product->minimum_amount) class="yellow-row" @endif>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>{{ $product->confirm_amount }}</td>
                                <td>{{ $product->minimum_amount }}</td>
                                <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                                <td>
                                    <a href="#" title="Editar">
                                        <!-- Ícone de edição -->
                                    </a>
                                    <a href="#" title="Remover">
                                        <!-- Ícone de remoção -->
                                    </a>
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
