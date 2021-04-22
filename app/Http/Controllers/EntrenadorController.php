<?php

namespace App\Http\Controllers;

use App\Entrenador;
use Illuminate\Http\Request;

class EntrenadorController extends Controller
{
   
    public function index(Request $request)
    {
        $buscar= $request->buscar;
        if($buscar==''){
            $entrenador=Entrenador::all();
        }
        else{
            $entrenador=Entrenador::where('nombre','like','%'.$buscar.'%')
            ->get();
        }
        return $entrenador;
    }

  
    public function store(Request $request)
    {
        $entrenador = new Entrenador;
        $entrenador->nombre=$request->nombre;
        $entrenador->apellido=$request->apellido;
        $entrenador->save();
    }

    public function update(Request $request){
        $entrenador = Entrenador::findOrFail($request->id);
        $entrenador->nombre=$request->nombre;
        $entrenador->apellido=$request->apellido;
        $entrenador->save();
    }

    public function delete(Request $request){
        $entrenador = Entrenador::findOrFail($request->id);
        $entrenador->delete();
    }

    
}
