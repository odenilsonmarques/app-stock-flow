<!DOCTYPE html>
<html>

<head>
    <title>produtos</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid black;
        }

        th,
        td {
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
                {{-- <th>#</th> --}}
                <th>Prod</th>
                <th>Qt Recebida</th>
                <th>Qt Estoque</th>
                <th>Qt Saida</th>
                <th>Data da saida</th>
                <th>tipo</th>
                <th>Destino</th>
                <th>Entregador</th>
                <th>Recebedor</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($productsOutPuts as $productsOutPut)
                <tr>
                    {{-- <td>{{ $productsOutPut->id }}</td> --}}
                    <td>{{ $productsOutPut->product->name }}</td>
                    <td>{{ $productsOutPut->product->amount}}</td>
                    <td>
                        @if ($productsOutPut->product->confirm_amount == 0)
                            Esgotado
                        @else
                            {{ $productsOutPut->product->confirm_amount }}
                        @endif
                    </td>
                    <td>{{ $productsOutPut->amount_outPut }}</td>
                    <td>{{ \Carbon\Carbon::parse($productsOutPut->created_at)->format('d/m/Y H:i') }}</td>
                    <td>{{ $productsOutPut->typeOutPut }}</td>
                    <td>{{ $productsOutPut->destiny }}</td>
                    <td>{{ $productsOutPut->responsible_for_leaving }}</td>
                    <td>{{ $productsOutPut->responsible_for_receiving }}</td>
                    {{-- <td>{{ $dataProducts->cnpj }}</td>
                    <td>{{ $dataProducts->phone }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
