@extends('layouts.template')
@section('title','Produtos')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-sm-12 mt-5">
                @if(session('messageCreate'))
                    <div class="alert alert-success alert-dismissible msg fade show text-center" role="alert">
                        <strong>{{session('messageCreate')}}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="table-responsive">
                    <table class="table table table-hover caption-top">
                        <caption class="suppliers">Produtos<br>
                            <button type="button" class="btn btn-secondary btn-sm mt-3"><a href="{{route('product.create')}}">Novo
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z"/>
                                </svg></a>
                            </button>
                            @php
                                $countConfirmAmount = 0;
                                $countConfirmAmounttAndMinimumAmount = 0;
                            @endphp
                            @foreach($products as $product)
                                @if($product->confirm_amount == 0)
                                    @php
                                        $countConfirmAmount++;
                                    @endphp
                                @endif

                                @if($product->confirm_amount == $product->minimum_amount)
                                    @php
                                        $countConfirmAmounttAndMinimumAmount++;
                                    @endphp
                                @endif
                            @endforeach

                            <button type="button" class="btn btn-danger btn-sm position-relative mt-3 tetse">
                                Produtos esgotados
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary">
                                    {{ $countConfirmAmount }}
                                </span>
                            </button>

                            <button type="button" class="btn btn-warning btn-sm position-relative mt-3 tetse">
                                Produtos com quantidade minima
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-primary ">
                                    {{ $countConfirmAmounttAndMinimumAmount }}
                                </span>  
                            </button>

                        </caption>
                        
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
                            @foreach($products as $product)
                                <tr @if($product->confirm_amount == $product->minimum_amount) class="red-row" 
                                    @elseif($product->confirm_amount < $product->minimum_amount) class="yellow-row"
                                    @endif>
                                    <td>{{$product->name}}</td>
                                    <td>{{$product->supplier->name}}</td>
                                    <td>{{$product->amount}}</td>
                                    <td>{{$product->confirm_amount}}</td>
                                    <td>{{$product->minimum_amount}}</td>
                                    <td>{{date('d/m/Y',strtotime($product->created_at))}}</td>
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