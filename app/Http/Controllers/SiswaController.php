<?php

namespace App\Http\Controllers;
use App\Models\siswa;
use Illuminate\Http\Request;
use Illuminate\Database\QueryException as DatabaseQueryException;
class SiswaController extends Controller
{
    public function index(){
        return siswa::all();
    }

    //simpan data
    public function create(request $request){
        $siswa = new siswa();
        $siswa->nama = $request->nama;
        $siswa->nobp = $request->nobp;
        $siswa->jurusan = $request->jurusan;
        $siswa->alamat = $request->alamat;
        $siswa->save();
        return "Data Berhasil Di simpan";
    }

    //update data

    public function update(request $request,$id){

       $nama = $request->nama;
       $nobp = $request->nobp;
       $jurusan = $request->jurusan;
       $alamat = $request->alamat;
        $siswa = siswa::find($id);
        $siswa -> nama=$nama;
        $siswa -> nobp=$nobp;
        $siswa -> jurusan=$jurusan;
        $siswa -> alamat=$alamat;
        $siswa->save();
        return "Data Berhasil Di Update";
    }

    public function delete($id){
        $siswa=siswa::find($id);
        $siswa->delete();
        return"Data Berhasil Di Hapus";
    }
}
