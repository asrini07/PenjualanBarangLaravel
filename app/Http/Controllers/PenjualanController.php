<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;
use DB;
use Validator;

class PenjualanController extends Controller
{

    public function index()
    {
        // dd('a');
        // $data = Penjualan::all();
        $data = Penjualan::select('penjualan.id','penjualan.id_barang', 'penjualan.jumlah', 'penjualan.total_harga', 'barang.id_barang as barang', 'barang.name', 'barang.satuan', 'barang.harga')
        ->Join('barang', 'barang.id', '=', 'penjualan.id_barang')->get();
  
        return view('pages/penjualan/index', compact('data'));
    }

    public function create()
    {
        $barang =  Barang::select('id','name')->get();
    
        return view('pages/penjualan/create',compact('barang'));
    }

    public function store(Request $request)
    {
        // dd($request);
        \Validator::make($request->all(), [
            'jumlah' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{
            $barang = Barang::where('id',$request->id_barang)->first();
          
            if($request->jumlah > $barang->stok_barang){
                
                return \Redirect::to("/penjualan")->with('error', 'Data Gagal Ditambahkan karena jumlah pembelian melebihi stook barang');
          
            } else {
                $total = $request->jumlah * $barang->harga;
                $stokbarang = $barang->stok_barang - (int) $request->jumlah;
                $barang->stok_barang =$stokbarang;
                $barang->save();
               
                $store              = new Penjualan;
                $store->id_barang   = $request->id_barang;  
                $store->jumlah      = $request->jumlah;
                $store->total_harga = $total;
                $store->save();
                
            
                \DB::commit();
                return \Redirect::to("/penjualan")->with('success', 'Data Penjualan Berhasil Ditambahkan');
            }
         
          
          
        } catch(\Error $e){
            return \Redirect::to("/penjualan")->with('error', 'Data Penjualan Gagal Ditambahkan');
        }     
    }

    public function getharga($id)
    {
        $harga = Barang::select('barang.id as id_barang', 'barang.harga as harga')
        ->where('barang.id', $id)
        ->first();
        
      return json_encode($harga);
       
    }

    public function edit($id)
    {
        // dd($id);
        // $authorize = new User();
        // $authorize->authorizeRoles([1]);


        $data = Penjualan::select('penjualan.id', 'penjualan.jumlah', 'penjualan.total_harga', 'barang.id_barang as barang', 'barang.name', 'barang.satuan', 'barang.harga')
        ->Join('barang', 'barang.id', '=', 'penjualan.id_barang')->where('penjualan.id', $id)->first();
     
        return view('pages/penjualan/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'jumlah' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{

            $penjualan = Penjualan::where('id', $id)->first();
            $barang = Barang::where('id',$penjualan->id_barang)->first();

            if($barang){
                $stok = $penjualan->jumlah + $barang->stok_barang;
                $barang->stok_barang = $stok;
                $barang->save();
            }
         
            if($request->jumlah > $barang->stok_barang){
                // dd('masukkkkk');
                return \Redirect::to("/penjualan")->with('error', 'Data Gagal Ditambahkan karena jumlah pembelian melebihi stook barang');
            } else {
                // dd('editttttt');
                $total = $request->jumlah * $barang->harga;
                $stokbarang = $barang->stok_barang - $request->jumlah;

                $barang->stok_barang =$stokbarang;
                $barang->save();
               
                // $edit              = new Penjualan;
                $penjualan->id_barang   = $penjualan->id_barang;  
                $penjualan->jumlah      = $request->jumlah;
                $penjualan->total_harga = $total;
                $penjualan->save();
                
            
                \DB::commit();
                return \Redirect::to("/penjualan")->with('success', 'Data Penjualan Berhasil Ditambahkan');
            }
         
          
          
        } catch(\Error $e){
            return \Redirect::to("/penjualan")->with('error', 'Data Penjualan Gagal Ditambahkan');
        }    

    }

}