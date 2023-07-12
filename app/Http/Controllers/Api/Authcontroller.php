<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Nette\Utils\Validators;
use Illuminate\Support\Facades\Validator;
use Illuminate\Database\QueryException as DatabaseQueryException;
use function PHPUnit\Framework\returnSelf;
use Illuminate\Http\Response;

class Authcontroller extends Controller
{
    public function destroy($id)
    {
        try { 
            User::findOrFail($id)->delete();
            return response()->json(['success'=>'category deleted successfully. ']);
        }catch (\Exception $e){
            return response()->json([
                'error'=>'No result'
            ], Response::HTTP_FORBIDDEN);
        }
    }

    public function semua()
    {
        try {
            $category = User::all();
            return response()->json($category, Response::HTTP_OK);
        }catch (DatabaseQueryException $e) {
            $error = [
                'error'=> $e->getMessage()
            ];
            return response()->json($error, Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    public function login(Request $request)
    {
       $validasi = validator::make($request->all(),[
        'email'=>'required',
        'password'=>'required|min:6',
       ]);

       if ($validasi->fails()) {
        return $this->error($validasi->errors()->first());
       }
       $user =User::where('email',$request->email)->first();
       if ($user){
        if (password_verify($request->password,$user->password)){
            return $this->sukses($user);
        }else {
            return $this->error("Password Salah");
        }
       }

       return response()->json([
        'code'=>'200',
        'message'=>'User Tidak Ada'
       ]);
}

public function register (Request $request){
    $validasi = validator:: make($request->all(),[
        'name'=> 'required',
        'phone'=> 'required|unique:users',
        'email'=>'required|unique:users',
        'password'=>'required|min:6',
    ]);
if ($validasi->fails()){
    return response()->json ([
        'code'=>'200',
        'message'=>$validasi->errors()->first(),
    ]);
}

$user = User::create(array_merge($request->all(),[
 'password'=>bcrypt($request->password)   
]));

if($user) {
    return response()->json([
        'Code'=>'400',
        'message'=>'Selamat Datang' . $user->name
    ]);
}else {
    return $this->error ('Terjadi Kesalahan');
}

    
}
}