<?php

use App\Http\Controllers\BodegaController;
use App\Http\Controllers\DispositivoController;
use App\Http\Controllers\MarcaController;
use App\Http\Controllers\ModeloController;
use App\Models\Dispositivo;
use Illuminate\Bus\Dispatcher;
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

// pregunta 1.2.1
Route::get('/listarMarcas',[MarcaController::class,'listarMarcas']); 
// pregunta 1.2.2
Route::get('/listarModelosMarca',[ModeloController::class,'listarModelosMarca']); 
// pregunta 1.2.3
Route::get('/listarDispositivosModeloMarca',[DispositivoController::class,'listarDispositivosModeloMarca']); 
// pregunta 1.2.4
Route::get('/listarDispositivos',[BodegaController::class,'listarDispositivos']);



//Listar Bodegas
Route::get('/listarBodegas',[BodegaController::class,'listarBodegas']);

//Listar Dispositivos
Route::get('/listarDispositivos',[DispositivoController::class,'listarDispositivos']);

//Guardar Dispositivos
Route::post('/guardarDispositivo',[DispositivoController::class,'guardarDispositivo']);