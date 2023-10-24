<?php

namespace App\Http\Controllers;

use App\Models\Dispositivo;
use App\Models\Marca;
use App\Models\Modelo;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class DispositivoController extends Controller
{
    // Listar dispositivos de un modelo o marca (id, nombre, modelo, marca) orwhere
    public function listarDispositivosModeloMarca(Request $request){
        
        $idMarca = $request['idMarca'];
        $idModelo = $request['idModelo'];

        Log::info(['idMarca'=> $idMarca]);
        
        if($idModelo == NULL && $idMarca == NULL || ($idModelo != NULL && $idMarca != NULL)){
            throw new Exception("Solicitud Erronea");
        }

        /* En caso de que el id modelo sea nulo, se realiza la consulta en tabla marca, 
        para obtener el nombre de la marca y la siguiente consulta en tabla dispositivos, para obtener
        los valores de id, nombre dispositivo y nombre modelo(nombre se obtiene por join)
         */

        if($idModelo==NULL){
            $nombreMarca = Marca::select('nombre')
            ->where('id',$idMarca)
            ->first()
            ->nombre;


            $respuesta = Dispositivo::
                select('dispositivo.id','dispositivo.nombre','modelo.nombre as modeloNombre','modelo.id as modeloId', 'dispositivo.id_bodega as bodegaId')
                ->join('modelo','dispositivo.id_modelo','=', 'modelo.id')
                ->where('modelo.id_marca',$idMarca)
                ->get()
                ->toArray(); // la coleccion $respuesta se transforma en array
            return[
                "dispositivos" => $respuesta,
                "nombreMarca" => $nombreMarca

            ];
        }

        if($idMarca==NULL){
            $nombreMarca = Modelo::select('marca.nombre')
            ->join('marca','modelo.id_marca','=','marca.id')
            ->where('modelo.id',$idModelo)
            ->first()
            ->nombre;

            $respuesta = Dispositivo::select('dispositivo.id','dispositivo.nombre','modelo.nombre as modeloNombre')
            ->join('modelo','dispositivo.id_modelo','=', 'modelo.id')
            ->where('modelo.id',$idModelo)
            ->get()
            ->toArray();

            return[
                "nombreMarca" => $nombreMarca,
                "dispositivos" => $respuesta
            ];
        }

    }

    public function guardarDispositivo(Request $request){
        $request->validate([
            'nombre' => 'required|string|max:255',
            'id_modelo' => 'required|exists:modelos,id',
            'id_bodega' => 'required|exists:bodegas,id',
        ]);
    
        try {
            $dispositivo = new Dispositivo();
            $dispositivo->nombre = $request->input('nombre');
            $dispositivo->id_modelo = $request->input('id_modelo');
            $dispositivo->id_bodega = $request->input('id_bodega');
            $dispositivo->save(); // Guarda el dispositivo en la base de datos
    
            return response()->json(['message' => 'Dispositivo guardado con éxito'], 201);
        } catch (\Exception $e) {
            // Manejo de errores
            return response()->json(['message' => 'Error al guardar el dispositivo'], 500);
        }

    }
    

    public function listarDispositivos (Request $request){
        Dispositivo::select('*');
    }
}
