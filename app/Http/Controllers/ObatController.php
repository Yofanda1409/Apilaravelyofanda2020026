<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class ObatController extends Controller
{
    public function index(){
        return obat::all();
    }
    public function create(request $request){
        $siswa = new obat();
        $siswa->kodeobat= $request->kodeobat;
        $siswa->jenis = $request->jenis;
        $siswa->pabrik = $request->pabrik;
        $siswa->harga = $request->harga;
        $siswa->save();
        return "Data Berhasil Di simpan";
    }
    
    //update data
    
    public function update(request $request,$id){
    
       $kode = $request->kodeobat;
       $jenis = $request->jenis;
       $pabrik = $request->pabrik;
       $harga = $request->harga;
        $siswa = obat::find($id);
        $siswa -> nama=$kode;
        $siswa -> nobp=$jenis;
        $siswa -> jurusan=$pabrik;
        $siswa -> alamat=$harga;
        $siswa->save();
        return "Data Berhasil Di Update";
    }
    public function delete($id){
        $siswa=obat::find($id);
        $siswa->delete();
        return"Data Berhasil Di Hapus";
    }
    
}

