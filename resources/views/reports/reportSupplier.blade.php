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
    <p>Data: {{ $date }}</p>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Cnpj</th>
                <th>Phone</th>
            </tr>
        </thead>
        <tbody>
            @foreach($suppliers as $supplier)
                <tr>
                    <td>{{ $supplier->id }}</td>
                    <td>{{ $supplier->name }}</td>
                    <td>{{ $supplier->cnpj }}</td>
                    <td>{{ $supplier->phone }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
