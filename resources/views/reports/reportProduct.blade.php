<!DOCTYPE html>
<html>
<head>
    <title>produtos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 1px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>{{ $title }}</h1>
    <p>Data: {{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>código</th>
                <th>Nome</th>
                <th>Fornecedor</th>
                <th>Qtd recebida</th>
                <th>Qtd em estoque</th>
                <th>Data do cadastro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->product_number  }}</td>
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
                    <td>{{ date('d/m/Y', strtotime($product->created_at)) }}</td>


                    {{-- <td>{{ $dataProducts->cnpj }}</td>
                    <td>{{ $dataProducts->phone }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
