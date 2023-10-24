<?php

namespace App\Http\Controllers;

use App\Models\Modelo;
use Illuminate\Http\Request;

class ModeloController extends Controller
{
    //Listar modelos de una marca (id, nombre, marca)
    public function listarModelosMarca(Request $request){
        $id = $request['id']; //id marca
        return Modelo::
            select('modelo.id','modelo.nombre','marca.nombre as marcaNombre')
            ->join('marca','modelo.id_marca','=','marca.id')
            ->where('modelo.id_marca',$id)
            ->get();

    }
}
