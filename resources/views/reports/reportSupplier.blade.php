<!DOCTYPE html>
<html>
<head>
    <title>fornecedores</title>
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
    <p>Data: {{ date('d/m/Y') }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Pessoa</th>
                <th>Nº documento</th>
                <th>Phone</th>
                <th>Cadastrado em</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->type_supplier }}</td>
                    <td>{{ $supplier->cpf_cnpj }}</td>
                    <td>{{ $supplier->phone }}</td>
                    <td>{{ \Carbon\Carbon::parse($supplier->created_at)->format('d/m/Y H:i') }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
