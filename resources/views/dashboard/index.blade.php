@extends('layouts.template')
@section('title', 'dashboard')

@section('content')
    <div class="container-fluid">
        <div class="container data-dashboard mt-5">
            <div class="row text-center justify-content-center">
                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card ">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Total de Fornecedores</h6>
                            <a href="#"  data-bs-toggle="modal" data-bs-target="#supplierModal" class="btn btn-primary">{{ $quantitySuppliers }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                    <div class="card card-black">
                        <div class="card-body">
                            <h6 class="card-title">Produtos Cadastrados</h6>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productModal" class="btn btn-primary"> {{ $quantityProducts }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos Disponiveis</h6>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#productAvailableModal" class="btn btn-primary">{{ $quantityProductsAvailables }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos com quantidade minima</h6>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productsMinimumModal"> {{ $quantityProductsMinimums }}</a>
                        </div>
                    </div>
                </div>


                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos abaixo da quantidade minima</h6>
                                <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productsBeloMinimumModal"> {{ $quantityProductsBelowMinimums }}</a>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-3 show-card">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Produtos com estoque zerado</h6>
                            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productsWithZeroStockModal">  {{ $quantityProductsWithZeroStocks }}</a>
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

                <div class="modal fade" id="productsMinimumModal" tabindex="-1" aria-labelledby="productsMinimumModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table  ">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsQuantityMinimums as $quantityProductsMinimum)
                                            <tr>
                                                <td>{{ $quantityProductsMinimum->name }}</td>
                                                <td>{{ $quantityProductsMinimum->confirm_amount }}</td>
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

                <div class="modal fade" id="productsBeloMinimumModal" tabindex="-1" aria-labelledby="productsBeloMinimumModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table  ">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsQuantityBelowMinimums as $productsQuantityBelowMinimum)
                                            <tr>
                                                <td>{{ $productsQuantityBelowMinimum->name }}</td>
                                                <td>{{ $productsQuantityBelowMinimum->confirm_amount }}</td>
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

                <div class="modal fade" id="productsWithZeroStockModal" tabindex="-1" aria-labelledby="productsWithZeroStockModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog modal-lg modal-dialog-scrollable">
                        <div class="modal-content">
                            <div class="modal-body">
                                <table class="table table table-hover">
                                    <thead class="table header-table  ">
                                        <tr>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsQuantityWithZeroStocks as $productsQuantityWithZeroStock)
                                            <tr>
                                                <td>{{ $productsQuantityWithZeroStock->name }}</td>
                                                <td>{{ $productsQuantityWithZeroStock->confirm_amount }}</td>
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

                <div class="row">
                    {{-- div para rederizar o gráfico --}}
                    {{-- <div class="chart-container  mt-5">
                        <canvas id="myChart" height="80"></canvas>
                    </div> --}}
                   

                    <div class="chart-container">
                        <canvas id="myChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
<script>
    var ctx = document.getElementById('myChart').getContext('2d');
var myChart = new Chart(ctx, {
    type: 'line',
    data: {
        labels: <?php echo $months; ?>,
        datasets: [
            {
                label: 'Entrada de Produtos Mensal',
                data: <?php echo $quantities; ?>,
                backgroundColor: 'rgba(75, 192, 192, 0.2)',
                borderColor: 'rgba(75, 192, 192, 1)',
                borderWidth: 1
            }
        ]
    },
    options: {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true
                }
            }]
        }
    }
});

</script>
    
    

@endsection
