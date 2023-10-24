<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    // Listar las marcas (id, nombre)
    public function listarMarcas(Request $request){
        return Marca::select('id','nombre')->get();
    }
}
