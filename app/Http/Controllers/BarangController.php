<?php

namespace App\Http\Controllers;
use App\Models\barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index(){
        return barang::all();
        
    }

     //simpan data
     public function create(request $request){
       
        $barang = new barang();
        $barang->nama = $request->nama;
        $barang->harga = $request->harga;
        $barang->deskripsi = $request->deskripsi;
        $barang->category = $request->category;
        $barang->image = $request->image;
        $barang->save();
        return "Data Berhasil Di simpan";

        
    }
    
}
