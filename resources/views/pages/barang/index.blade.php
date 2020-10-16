<!doctype html>
<html lang="en">
  <head>
	<title>CRUD Penjualan </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  
  </head>
  <body>
  		<div class="jumbotron text-center">
			<h1>Data Barang</h1>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<a href="/barang/create" class="btn btn-primary"> + Tambah Data</a><br><br>
					@if ($message = Session::get('success'))
					<div class="alert alert-success alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{ $message }}</strong>
					</div>
					@endif

					@if ($message = Session::get('error'))
					<div class="alert alert-danger alert-block">
						<button type="button" class="close" data-dismiss="alert">×</button> 
						<strong>{{ $message }}</strong>
					</div>
					@endif

					<table class="table table-striped">
						<tr>
							<th>ID Barang</th>
							<th>Name</th>
							<th>Satuan</th>
							<th>Harga Satuan</th>
							<th>Stok Barang</th>
							<th>Aksi</th>
						</tr>

						@foreach($data as $p)
						<tr>
							<td>{{ $p->id_barang }}</td>
							<td>{{ $p->name }}</td>
							<td>{{ $p->satuan }}</td>
							<td>{{ $p->harga }}</td>
							<td>{{ $p->stok_barang }}</td>
							<td>
								<a href="/barang/edit/{{ $p->id }}" class="btn btn-info">Edit</a>
								|
								<a href="/barang/delete/{{ $p->id }}" class="btn btn-danger">Hapus</a>
							</td>
						</tr>
						@endforeach
						
					</table>
				</div>
			</div>
		</div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
  </body>
</html>
