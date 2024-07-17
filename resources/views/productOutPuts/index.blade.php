@extends('layouts.template')
@section('title', 'Entrega de produto')

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
                    <form action="{{ route('productsoutputs.search') }}" method="POST" class="form-horizontal">
                        @csrf
                        <div class="input-group">
                            <input type="text" name="name" id="name" class="form-control inputSearch sm mx-1"
                                placeholder="Digite o nome do produto">

                            <input type="text" name="destiny" id="destiny" class="form-control inputSearch sm "
                                placeholder="Digite o destino">

                            <div class="input-group-append ml-3">
                                <button type="submit" class="btn btn-outline-secondary inputSearch">Buscar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-lg-6 d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="button" class="button-new-register btn-sm"><a
                        href="{{ route('generateReportProductOutPut.report') }}" target="_blank">Gerar
                        relatório
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-file-earmark-pdf-fill" viewBox="0 0 16 16">
                            <path
                                d="M5.523 12.424q.21-.124.459-.238a8 8 0 0 1-.45.606c-.28.337-.498.516-.635.572l-.035.012a.3.3 0 0 1-.026-.044c-.056-.11-.054-.216.04-.36.106-.165.319-.354.647-.548m2.455-1.647q-.178.037-.356.078a21 21 0 0 0 .5-1.05 12 12 0 0 0 .51.858q-.326.048-.654.114m2.525.939a4 4 0 0 1-.435-.41q.344.007.612.054c.317.057.466.147.518.209a.1.1 0 0 1 .026.064.44.44 0 0 1-.06.2.3.3 0 0 1-.094.124.1.1 0 0 1-.069.015c-.09-.003-.258-.066-.498-.256M8.278 6.97c-.04.244-.108.524-.2.829a5 5 0 0 1-.089-.346c-.076-.353-.087-.63-.046-.822.038-.177.11-.248.196-.283a.5.5 0 0 1 .145-.04c.013.03.028.092.032.198q.008.183-.038.465z" />
                            <path fill-rule="evenodd"
                                d="M4 0h5.293A1 1 0 0 1 10 .293L13.707 4a1 1 0 0 1 .293.707V14a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2V2a2 2 0 0 1 2-2m5.5 1.5v2a1 1 0 0 0 1 1h2zM4.165 13.668c.09.18.23.343.438.419.207.075.412.04.58-.03.318-.13.635-.436.926-.786.333-.401.683-.927 1.021-1.51a11.7 11.7 0 0 1 1.997-.406c.3.383.61.713.91.95.28.22.603.403.934.417a.86.86 0 0 0 .51-.138c.155-.101.27-.247.354-.416.09-.181.145-.37.138-.563a.84.84 0 0 0-.2-.518c-.226-.27-.596-.4-.96-.465a5.8 5.8 0 0 0-1.335-.05 11 11 0 0 1-.98-1.686c.25-.66.437-1.284.52-1.794.036-.218.055-.426.048-.614a1.24 1.24 0 0 0-.127-.538.7.7 0 0 0-.477-.365c-.202-.043-.41 0-.601.077-.377.15-.576.47-.651.823-.073.34-.04.736.046 1.136.088.406.238.848.43 1.295a20 20 0 0 1-1.062 2.227 7.7 7.7 0 0 0-1.482.645c-.37.22-.699.48-.897.787-.21.326-.275.714-.08 1.103" />
                        </svg>
                </button>
                <button type="button" class="button-new-register btn-sm">
                    <a href="{{ route('productsoutputs.create') }}" class="new-supplier">Nova saida
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                            <path
                                d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3v-3z" />
                        </svg>
                    </a>
                </button>
            </div>
        </div>

        <div class="row">
            <div class="table-responsive mt-2">
                <table class="table table table-hover">
                    <thead class="table header-table">
                        <tr>
                            <th>Cod</th>
                            <th>Produto</th>
                            <th>Qt Recebida</th>
                            <th>Qt Saida</th>
                            <th>Qt Estoque</th>
                            <th>tipo</th>
                            <th>Destino</th>
                            <th>Entregador</th>
                            <th>Recebedor</th>
                            <th>Data da saida</th>
                            <th>
                                Ações
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($productOutPuts as $productOutPut)
                            <tr @if ($productOutPut->product->confirm_amount == 0) class="red-row" @endif>
                                <td>{{ $productOutPut->id}}</td>
                                <td>{{ $productOutPut->product->name }}</td>
                                <td>{{ $productOutPut->product->amount }}</td>
                                <td>{{ $productOutPut->amount_outPut }}</td>
                                <td>
                                    @if ($productOutPut->product->confirm_amount == 0)
                                        Esgotado
                                    @else
                                        {{ $productOutPut->product->confirm_amount }}
                                    @endif
                                </td>
                                <td>{{ $productOutPut->typeOutPut }}</td>
                                <td>{{ $productOutPut->destiny }}</td>
                                <td>{{ $productOutPut->responsible_for_leaving }}</td>
                                <td>{{ $productOutPut->responsible_for_receiving }}</td>
                                <td>{{ \Carbon\Carbon::parse($productOutPut->created_at)->format('d/m/Y H:i') }}</td>
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
                    {{ $productOutPuts->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
