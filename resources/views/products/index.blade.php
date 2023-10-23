@extends('layouts.template')
@section('title', 'Produtos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                @if (session('messageCreate'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center alert-custom" role="alert">
                        <strong>{{ session('messageCreate') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <div class="row search-and-button">
            <div class="col-lg-6 col align-self-start">
                <div class="input-group">
                    <form action="{{ route('product.search') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" id="name" class="form-control inputSearch sm"
                                placeholder="Digite o nome do produto">

                            <div class="input-group-append">
                                <button type="submit" class="btn btn-outline-secondary inputSearch">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-end">

                <p class="warning-product mt-2">
                    <a href="{{ route('product.index') }}" data-bs-toggle="modal"
                        data-bs-target="#emptyProductsModal">Produtos esgotados {{ $countConfirmAmount }}</a>
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
                            <tr @if ($product->confirm_amount == 0) class="red-row" @endif>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->supplier->name }}</td>
                                <td>{{ $product->amount }}</td>
                                <td>
                                    @if ($product->confirm_amount == 0)
                                        Esgotado
                                    @else
                                        {{ $product->confirm_amount }}
                                    @endif
                                </td>
                                <td>{{ $product->minimum_amount }}</td>
                                <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>
                                <td>
                                    <a href="#" title="Editar">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                            <path
                                                d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                            <path fill-rule="evenodd"
                                                d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z" />
                                        </svg>
                                    </a>
                                    <a href="#" title="Remover">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            fill="currentColor" class="bi bi-trash3" viewBox="0 0 16 16">
                                            <path
                                                d="M6.5 1h3a.5.5 0 0 1 .5.5v1H6v-1a.5.5 0 0 1 .5-.5ZM11 2.5v-1A1.5 1.5 0 0 0 9.5 0h-3A1.5 1.5 0 0 0 5 1.5v1H2.506a.58.58 0 0 0-.01 0H1.5a.5.5 0 0 0 0 1h.538l.853 10.66A2 2 0 0 0 4.885 16h6.23a2 2 0 0 0 1.994-1.84l.853-10.66h.538a.5.5 0 0 0 0-1h-.995a.59.59 0 0 0-.01 0H11Zm1.958 1-.846 10.58a1 1 0 0 1-.997.92h-6.23a1 1 0 0 1-.997-.92L3.042 3.5h9.916Zm-7.487 1a.5.5 0 0 1 .528.47l.5 8.5a.5.5 0 0 1-.998.06L5 5.03a.5.5 0 0 1 .47-.53Zm5.058 0a.5.5 0 0 1 .47.53l-.5 8.5a.5.5 0 1 1-.998-.06l.5-8.5a.5.5 0 0 1 .528-.47ZM8 4.5a.5.5 0 0 1 .5.5v8.5a.5.5 0 0 1-1 0V5a.5.5 0 0 1 .5-.5Z" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>

                </table>
                <div class="flex justify-start space-x-4 mt-4">
                    {{ $products->links() }}
                </div>
            </div>
        </div>

        <div class="row">
            <div class="modal fade" id="emptyProductsModal" tabindex="-1" aria-labelledby="emptyProductsModalLabel"
                aria-hidden="true">
                <div class="modal-dialog modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="emptyProductsModalLabel">Produtos Esgotados</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table class="table table table-hover">
                                <thead class="table header-table">
                                    <tr>
                                        <th>Produto</th>
                                        <th>Fornecedor</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($productsEmptys as $productsEmpty)
                                        <tr>
                                            <td>{{ $productsEmpty->name }}</td>
                                            <td>{{ $productsEmpty->supplier->name }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection
