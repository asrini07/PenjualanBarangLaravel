<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Penjualan;
use DB;
use Validator;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd('a');
        $data = Barang::all();
  
        return view('pages/barang/index', compact('data'));
    }

    public function create()
    {
       
    
        return view('pages/barang/create');
    }

    public function store(Request $request)
    {
        
        \Validator::make($request->all(), [
            'name' => 'required|max:255', 
            'satuan' => 'required|max:255', 
            'stok' => 'required|integer', 
            'harga' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{
       
           
            $store          = new Barang;
            $store->name    = $request->name;
            $store->satuan    = $request->satuan; 
            $store->harga    = $request->harga; 
            $store->stok_barang    = $request->stok;            
            $store->save();
            

            $idbarang =(string)$store->id;
            $idbarang = "PR0".$idbarang;
            $store->id_barang = $idbarang;
            $store->save();
            \DB::commit();
            return \Redirect::to("/barang")->with('success', 'Data Barang Berhasil Ditambahkan');
        
          
        } catch(\Error $e){
            return \Redirect::to("/barang")->with('error', 'Data Buku Gagal Ditambahkan');
        }     
    
    }

    public function edit($id)
    {

        $data = Barang::find($id);
        return view('pages/barang/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'name' => 'required|max:255', 
            'satuan' => 'required|max:255', 
            'harga' => 'required|integer', 
            'stok' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{
       
          
            $data = Barang::where('id',$id)->first();
            $data->name    = $request->name;
            $data->harga    = $request->harga; 
            $data->satuan    = $request->satuan; 
            $data->stok_barang   = $request->stok;            
            $data->save();
        
            \DB::commit();
            return \Redirect::to("/barang")->with('success', 'Data Barang Berhasil Ditambahkan');
          
          
        } catch(\Error $e){
            return \Redirect::to("/barang")->with('error', 'Data Buku Gagal Ditambahkan');
        }     
    }

    public function destroy($id)
    {     
    //    dd($id);
        // $authorize = new User();
        // $authorize->authorizeRoles([1]);

        $checkdata = Penjualan::where('id_barang', $id)->first();
       
        \DB::beginTransaction();
        try{          

            if( empty($checkdata)) {
                // dd('masukkk aaaaa');
                $barang = Barang::where('id', $id)->delete();
                \DB::commit();

                return \Redirect::to("/barang")->with('success', 'Berhasil Menghapus Data Barang ');
            } else {
                // dd('gaaaaagal');
                \DB::rollBack();
                return \Redirect::to("/barang")->with('error', 'Gagal menghapus Data Barang karena data sudah digunakan');
            }

        } catch(\Error $e){
            \DB::rollBack();
            return \Redirect::to("/barang")->with('error', 'Gagal menghapus Data Barang karena data sudah digunakan');
        }
    }
}