<html>
<head>
	<!-- <title>CRUD Penjualan </title> -->
</head>
<body>

	<h3>Form Barang</h3> 

        <form role="form" action="{{route('store-barang') }}" method="post" id="form">
            {{ csrf_field() }}
            <div >
                
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"> Name </label>
                    <div class="col-sm-9">
                    <input type="text" name="name" class="form-control" placeholder="Nama Barang" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"> Satuan </label>
                    <div class="col-sm-9">
                    <input type="text" name="satuan" class="form-control" placeholder="Satuan Barang" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label  class="col-sm-3 col-form-label"> Stok Barang </label>
                    <div class="col-sm-9">
                    <input type="text" name="stok" class="form-control" placeholder="Stok Barang" required>
                    </div>
                </div>
            </div>
            <div >
                <button class="btn btn-primary" type="submit"><i class="fas fa-save"></i> Simpan</button>
                <a class="btn btn-danger" href="{{ url('barang') }}"><i class="fas fa-times"></i> Kembali</a>
            </div>
            </form>
		
	    </form>

    </body>
</html>
