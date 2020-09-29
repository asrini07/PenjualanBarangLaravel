<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
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
  
        // return response()->json([
        //     'success' => true,
        //     'status' =>200,
        //     'data' => $data
        // ]);
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
        ])->validate();

        \DB::beginTransaction();
        try{
       
            if( empty($check)) {
                $store          = new Barang;
                $store->name    = $request->name;
                $store->satuan    = $request->satuan; 
                $store->stok_barang    = $request->stok;            
                $store->save();
               

                $idbarang =(string)$store->id;
                $idbarang = "PR0".$idbarang;
                $store->id_barang = $idbarang;
                $store->save();
                \DB::commit();
                return \Redirect::to("/barang")->with('status', 'Data Barang Berhasil Ditambahkan');
            } else {

            \DB::rollBack();
                return \Redirect::to("/barang")->with('status', 'Data Buku Gagal Ditambahkan');
            }
          
        } catch(\Error $e){
            return \Redirect::to("/barang")->with('status', 'Data Buku Gagal Ditambahkan');
        }     
    
    }
    public function edit($id)
    {
        // dd($id);
        // $authorize = new User();
        // $authorize->authorizeRoles([1]);

        // $judul     = "Provinsi";
        // $tabmenu = "master";

        $data = Barang::find($id);
        return view('pages/barang/edit', compact('data'));
    }

    public function update(Request $request, $id)
    {
        \Validator::make($request->all(), [
            'name' => 'required|max:255', 
            'satuan' => 'required|max:255', 
            'stok' => 'required|integer',
        ])->validate();

        \DB::beginTransaction();
        try{
       
            if( empty($check)) {
                $data = Barang::where('id',$id)->first();
                $data->name    = $request->name;
                $data->satuan    = $request->satuan; 
                $data->stok_barang   = $request->stok;            
                $data->save();
            
                \DB::commit();
                return \Redirect::to("/barang")->with('status', 'Data Barang Berhasil Ditambahkan');
            } else {

            \DB::rollBack();
                return \Redirect::to("/barang")->with('status', 'Data Buku Gagal Ditambahkan');
            }
          
        } catch(\Error $e){
            return \Redirect::to("/barang")->with('status', 'Data Buku Gagal Ditambahkan');
        }     
    }
}