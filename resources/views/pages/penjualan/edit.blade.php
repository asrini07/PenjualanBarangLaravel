<html>
    <head>
        <title>CRUD Penjualan </title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    </head>
    <body>

        <div class="jumbotron text-center">
            <h1>Form Ubah Penjualan</h1>
        </div>
        <div class="container">
		    <div class="row">
			    <div class="col-sm-12">
                    <form role="form" action="{{ route('update-penjualan', $data->id) }}" method="post" id="form" class="needs-validation" novalidate="">
                    {{ csrf_field() }}
                    <div >
                        
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Name barang</label>
                            <div class="col-sm-9">
                            <input type="text" name="name" class="form-control" placeholder="Nama Barang" value="{{ $data->name ?? old('name') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Harga </label>
                            <div class="col-sm-9">
                            <input type="text" name="harga" class="form-control harga" placeholder="Harga Barang" value="{{ $data->harga ?? old('harga') }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label  class="col-sm-3 col-form-label"> Jumlah </label>
                            <div class="col-sm-9">
                            <input type="text" name="jumlah" class="form-control" placeholder="Jumlah Barang" value="{{ $data->jumlah ?? old('jumlah') }}" required>
                            </div>
                        </div>
                    </div>
                    <div >
                        <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                        <a class="btn btn-danger" href="{{ url('barang') }}"><i class="fas fa-times"></i> Kembali</a>
                    </div>
                    </form>
		
                </div>
			</div>
        </div>
        
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
</html>
