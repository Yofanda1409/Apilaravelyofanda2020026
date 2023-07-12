<?php

use App\Http\Controllers\Api\Authcontroller;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\SiswaController;
use Illuminate\Auth\Events\Login;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::post('login ',[Authcontroller::class, 'login']);
Route::get('loginbaru ',[Authcontroller::class, 'login']);
Route::post('register ',[Authcontroller::class, 'register']);
Route::get('semua ',[Authcontroller::class, 'semua']);

Route::get('obat ',[SiswaController::class, 'index']);
Route::post('obat ',[SiswaController::class, 'create']);
Route::put('/siswa/{id} ',[SiswaController::class, 'update']);
Route::delete('/siswa/{id} ',[SiswaController::class, 'delete']);

Route::get('barang ',[BarangController::class, 'index']);
Route::post('barang ',[BarangController::class, 'create']);


