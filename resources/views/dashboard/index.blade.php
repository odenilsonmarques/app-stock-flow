@extends('layouts.template')
@section('title', 'dashboard')

@section('content')
    <div class="container-fluid">
        <div class="container data-dashboard mt-5">
            <div class="row text-center justify-content-center">
                <div class="col-3 show-card ">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Total de Fornecedores</h6>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#supplierModal" class="btn btn-primary">{{ $quantitySuppliers }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 show-card">
                    <div class="card card-black">
                        <div class="card-body">
                            <h6 class="card-title">Produtos Cadastrados</h6>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productModal" class="btn btn-primary"> {{ $quantityProducts }}</a>
                        </div>
                    </div>
                </div>
                <div class="col-3 show-card ">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos Disponiveis</h6>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productAvailableModal" class="btn btn-primary">{{ $quantityProductsAvailables }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 show-card ">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos com quantidade minima</h6>
                            <a href="#" class="btn btn-primary"> {{ $totalProductsMinimumAmount }}</a>
                        </div>
                    </div>
                </div>


                <div class="col-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos abaixo da quantidade minima</h6>
                            <a href="#" class="btn btn-primary"> {{ $totalProductsBelowMinimumAmount }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos com estoque zerado</h6>
                            <a href="#" class="btn btn-primary">  {{ $totalProductsWithZeroStock }}</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="modal fade" id="supplierModal" tabindex="-1" aria-labelledby="supplierModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                          
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table">
                                        <tr>
                                            <th>Fornecedores</th>
                                            <th>Contato</th>
                                            <th>Cnpj</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($suppliers as $supplier)
                                            <tr>
                                                <td>{{ $supplier->name }}</td>
                                                <td>{{ $supplier->phone }}</td>
                                                <td>{{ $supplier->cnpj }}</td>
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

                <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade cadastrada</th>
                                            <th>Quantidade em estoque</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($products as $product)
                                            <tr>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->amount }}</td>
                                                <td>{{ $product->confirm_amount }}</td>
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


                <div class="modal fade" id="productAvailableModal" tabindex="-1" aria-labelledby="productAvailableModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table  ">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade em estoque</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsAvailables as $productsAvailable)
                                            <tr>
                                                <td>{{ $productsAvailable->name }}</td>
                                                <td>{{ $productsAvailable->confirm_amount }}</td>
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
    </div>
@endsection
