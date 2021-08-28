<!DOCTYPE html>
<html>
<head>
	<title>Laporan Produk Keluar</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
            border: 1px solid #ddd;
        
		}
	</style>
	<center>
		<h5>Laporan Produk Keluar</h4>
	</center>
    <div class="card">
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Customer</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @php $i=1 @endphp
                    @foreach($product_outs as $product_out)
                    <tr>
                        <td>{{ $i++ }}</td>
                        <td>{{ $product_out->product->name }}</td>
                        <td>{{ $product_out->customer->name }}</td>
                        <td>{{ $product_out->quantity }}</td>
                        <td>{{$product_out->date}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</body>
</html> 