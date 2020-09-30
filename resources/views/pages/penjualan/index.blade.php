<!doctype html>
<html lang="en">
  <head>
	<!-- Required meta tags -->
	<title>CRUD Penjualan </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  </head>
  <body>
  		<div class="jumbotron text-center">
			<h1>Data Penjualan</h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="/penjualan/create" class="btn btn-primary"> + Tambah Data</a><br><br>
					<table class="table table-striped">
						<tr>
							<th>Id Barang</th>
							<th>Name</th>
							<th>Satuan</th>
							<th>Jumlah</th>
							<th>Harga</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>

						@foreach($data as $p)
						<tr>
							<td>{{ $p->barang }}</td>
							<td>{{ $p->name }}</td>
							<td>{{ $p->satuan }}</td>
							<td>{{ $p->jumlah }}</td>
							<td>{{ $p->harga }}</td>
							<td>{{ $p->total_harga }}</td>
							<td>
								<a href="/penjualan/edit/{{ $p->id }}" class="btn btn-info">Edit</a>
								|
								<a href="/penjualan/hapus/{{ $p->id }}" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
						
					</table>
				</div>
			</div>
		</div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
