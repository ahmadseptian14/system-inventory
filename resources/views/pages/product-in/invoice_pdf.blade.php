<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>A simple, clean, and responsive HTML invoice template</title>


</head>

<style>
    #table-data {
        border-collapse: collapse;
        padding: 3px;
    }

    #table-data td, #table-data th {
        border: 1px solid black;
    }
</style>

<body>
<div class="invoice-box">


    <table border="0" id="table-data" width="80%">
        <tr>
            <td width="70px">Invoice ID</td>
            <td width="">: {{ $product_in->id }}</td>
            <td width="30px">Tanggal</td>
            <td>: {{ $product_in->date }}</td>
        </tr>

        <tr>
            <td>Telepon</td>
            <td>: {{ $product_in->product->supplier->phone }}</td>
            <td>Alamat</td>
            <td>: {{ $product_in->product->supplier->address }}</td>
        </tr>

        <tr>
            <td>Nama</td>
            <td>: {{ $product_in->product->supplier->name }}</td>
            <td>Email</td>
            <td>: {{$product_in->product->supplier->email}}</td>
        </tr>

        <tr>
            <td>Produk</td>
            <td >: {{ $product_in->product->name }}</td>
            <td>Jumlah</td>
            <td >: {{ $product_in->quantity }}</td>
        </tr>

    </table>

    {{--<hr  size="2px" color="black" align="left" width="45%">--}}


    <table border="0" width="80%">
        <tr align="right">
            <td>Hormat Kami</td>
        </tr>
    </table>

    <table border="0" width="80%">
        <tr align="right">
            <td><img src="https://upload.wikimedia.org/wikipedia/en/f/f4/Timothy_Spall_Signature.png" width="100px" height="100px"></td>
        </tr>

    </table>
    <table border="0" width="80%">
        <tr align="right">
            <td>Ahmad Septian</td>
        </tr>
    </table>
</div>
