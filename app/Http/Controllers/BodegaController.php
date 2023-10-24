<?php

namespace App\Http\Controllers;

use App\Models\Bodega;
use App\Models\Dispositivo;
use Illuminate\Http\Request;

class BodegaController extends Controller
{

    // Listar los dispositivos existentes en una bodega
    public function listarDispositivos(Request $request){ 
        $id = $request['id'];
        return Dispositivo::where('id_bodega',$id)->get();
    }

    // Listar Bodegas
    public function listarBodegas(Request $request){
        return Bodega::select('*')->get();
    }
}
