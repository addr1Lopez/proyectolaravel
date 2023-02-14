<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura cuota {{ $cuota->id }}</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f7f7f7;
            color: #333;
            line-height: 1.4;
        }
        
        .container {
            width: 90%;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px #ddd;
        }
        
        h1 {
            font-size: 24px;
            text-align: center;
            margin-bottom: 20px;
        }
        
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        
        th,
        td {
            padding: 10px;
            border: 1px solid #ddd;
        }
        
        th {
            background-color: #f7f7f7;
        }
        
        .text-right {
            text-align: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Factura de la cuota {{ $cuota->id }}</h1>
        <table>
            <tr>
                <th>ID:</th>
                <td>{{ $cuota->id }}</td>
            </tr>
            <tr>
                <th>Cliente:</th>
                <td>{{ $cuota->cliente->cif }}</td>
            </tr>
            <tr>
                <th>Concepto:</th>
                <td>{{ $cuota->concepto }}</td>
            </tr>
            <tr>
                <th>Fecha Emisión:</th>
                <td>{{ date('d-m-Y', strtotime($cuota->fechaEmision)) }}</td>
            </tr>
            <tr>
                <th>Importe:</th>
                <td>{{ $cuota->importe }}€</td>
            </tr>
            <tr>
                <th>Pagada:</th>
                <td>{{ $cuota->pagada }}</td>
            </tr>
            <tr>
                <th>Fecha Pago:</th>
                <td>{{ date('d-m-Y', strtotime($cuota->fechaPago)) }}</td>
            </tr>
            <tr>
                <th>Notas:</th>
                <td>{{ $cuota->notas }}</td>
            </tr>
        </table>
    </div>
</body>

</html>

