<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Invoice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            width: 80%;
            margin: auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .header h1 {
            margin: 0;
        }
        .invoice-details {
            margin-bottom: 20px;
        }
        .invoice-details h2 {
            margin: 0;
        }
        .invoice-details p {
            margin: 5px 0;
        }
        .items {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .items th, .items td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .items th {
            background-color: #f4f4f4;
        }
        .total {
            text-align: right;
            margin-top: 20px;
        }
        .total h3 {
            margin: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">
        <h1>Invoice</h1>
    </div>
    <div class="invoice-details">
        <h2>Invoice #{{ $id }}</h2>
        <p>Datum: {{ $date }}</p>
        <p>Vervaldatum: {{ $due_date }}</p>
    </div>
    <table class="items">
        <thead>
        <tr>
            <th>Huis</th>
            <th>Aantal Dagen</th>
            <th>Prijs per persoon per week</th>
            <th>Totaal</th>
        </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $description }}</td>
                <td>{{ $quantity }}</td>
                <td>{{ $unit_price }}</td>
                <td>{{ $total }}</td>
            </tr>
        </tbody>
    </table>
    <div class="total">
        <h3>Totaal: {{ $total }}</h3>
    </div>
</div>
</body>
</html>
